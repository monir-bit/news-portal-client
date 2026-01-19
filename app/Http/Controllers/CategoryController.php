<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','category')->get();
        return view('Pages.CategoryPage',["Seo" => $seo]);
    }

    /**
     * Show category page by slug
     * Format: /{category-slug}
     */
    public function showBySlug($categorySlug, $segment = null)
    {
        // Find category by slug
        $category = DB::table('categories')->where('slug', $categorySlug)->where('visible', 1)->first();
        
        // If not found by slug, try to find by old ID-based URL and redirect
        if (!$category) {
            // Check if it's an old ID-based URL (numeric)
            if (is_numeric($categorySlug)) {
                $category = DB::table('categories')->where('id', $categorySlug)->where('visible', 1)->first();
                if ($category) {
                    // Generate slug if not exists
                    if (empty($category->slug)) {
                        $categorySlug = \App\Models\Category::generateUniqueSlug($category->name, $category->id);
                        DB::table('categories')->where('id', $category->id)->update(['slug' => $categorySlug]);
                    } else {
                        $categorySlug = $category->slug;
                    }
                    return redirect("/{$categorySlug}", 301);
                }
            }
            abort(404, 'Category not found');
        }

        // If segment is provided, check if it's a subcategory or news
        if ($segment) {
            return $this->showBySlugSegment($categorySlug, $segment);
        }

        // Get category news from news_categories table
        $news = DB::table('news')
            ->join('news_categories', 'news_categories.news_id', '=', 'news.id')
            ->where('news_categories.category_id', $category->id)
            ->where('news.published', 1)
            ->leftJoin('news_sub_categories', 'news_sub_categories.news_id', '=', 'news.id')
            ->whereNull('news_sub_categories.sub_category_id')
            ->select('news.*')
            ->orderBy('news.date', 'desc')
            ->paginate(20);

        $seo = SeoModel::where('page_name', 'category')->first();
        
        return view('Pages.CategoryPage', [
            'category' => $category,
            'news' => $news,
            'Seo' => $seo ? [$seo] : []
        ]);
    }

    /**
     * Handle segment (subcategory or news)
     * Format: /{category-slug}/{segment}
     */
    public function showBySlugSegment($categorySlug, $segment)
    {
        // Find category
        $category = DB::table('categories')->where('slug', $categorySlug)->where('visible', 1)->first();
        
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Check if segment is a subcategory
        $subcategory = DB::table('subcategories')
            ->where('slug', $segment)
            ->where('category_id', $category->id)
            ->where('visible', 1)
            ->first();

        if ($subcategory) {
            // It's a subcategory page
            $news = DB::table('news')
                ->join('news_categories', 'news_categories.news_id', '=', 'news.id')
                ->where('news_categories.category_id', $category->id)
                ->join('news_sub_categories', 'news_sub_categories.news_id', '=', 'news.id')
                ->where('news_sub_categories.sub_category_id', $subcategory->id)
                ->where('news.published', 1)
                ->select('news.*')
                ->orderBy('news.date', 'desc')
                ->paginate(20);

            $seo = SeoModel::where('page_name', 'category')->first();
            
            return view('Pages.SubCategoryPage', [
                'category' => $category,
                'subcategory' => $subcategory,
                'news' => $news,
                'Seo' => $seo ? [$seo] : []
            ]);
        }

        // Check if segment is a news article (without subcategory)
        $news = DB::table('news')
            ->join('news_categories', 'news_categories.news_id', '=', 'news.id')
            ->where('news_categories.category_id', $category->id)
            ->where('news.slug', $segment)
            ->where('news.published', 1)
            ->leftJoin('news_sub_categories', 'news_sub_categories.news_id', '=', 'news.id')
            ->whereNull('news_sub_categories.sub_category_id')
            ->select('news.*')
            ->first();

        if ($news) {
            // Redirect to SingleNewsController
            $singleNewsController = new SingleNewsController();
            return $singleNewsController->showBySlug($categorySlug, null, $segment);
        }

        abort(404, 'Page not found');
    }
}
