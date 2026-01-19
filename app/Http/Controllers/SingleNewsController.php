<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;

class SingleNewsController extends Controller
{
    /**
     * Old method - using ID
     */
    function Page(Request $request, $nid){
        $apiUrl = 'https://count-server.sharethis.com/v2.0/get_counts?url=https://breakingnewsbd.net/get-news/'.$nid.'';

        $response = Http::get($apiUrl);
        $shareCounts = json_decode($response->getBody(), true);
        $smtc = isset($shareCounts['total']) ? $shareCounts['total'] : 0;
        
        $seo = SeoModel::where('news_id', $request->NewsID)->get();
        
        if(count($seo) < 1){
            $seo = [
                [
                    'title'=> "breakingnewsbd.com",
                    'share_title'=> "breakingnewsbd.com",
                    'description'=> "breakingnewsbd.com",
                    'keywords' => "breakingnewsbd.com",
                    'page_img' => "http://breakingnewsbd.net/bangla-admin/public/images/2023-05-30/1685386994shahajan-mp-02.jpg",
                ]
            ];
        }
        
        $newsInfo = DB::table('news')->where('id', $nid)->first();

        return view('Pages.SingleNewsPage', ["Seo" => $seo, "st" => $smtc, "nid" => $nid, 'newsInfo' => $newsInfo]);
    }

    /**
     * Show news by slug
     * Format: /{category-slug}/{subcategory-slug}/{news-slug}
     */
    public function showBySlug($categorySlug, $subcategorySlug, $newsSlug)
    {
        // Find category
        $category = DB::table('categories')->where('slug', $categorySlug)->where('visible', 1)->first();
        
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Find subcategory if provided
        $subcategory = null;
        if ($subcategorySlug && $subcategorySlug !== 'null') {
            $subcategory = DB::table('subcategories')
                ->where('slug', $subcategorySlug)
                ->where('category_id', $category->id)
                ->where('visible', 1)
                ->first();

            if (!$subcategory) {
                abort(404, 'Subcategory not found');
            }
        }

        // Find news by slug and category
        $query = DB::table('news')
            ->join('news_categories', 'news_categories.news_id', '=', 'news.id')
            ->where('news_categories.category_id', $category->id)
            ->where('news.slug', $newsSlug)
            ->where('news.published', 1)
            ->select('news.*');

        if ($subcategory) {
            $query->join('news_sub_categories', 'news_sub_categories.news_id', '=', 'news.id')
                ->where('news_sub_categories.sub_category_id', $subcategory->id);
        } else {
            // News without subcategory - check if news has no subcategory assigned
            $query->leftJoin('news_sub_categories', 'news_sub_categories.news_id', '=', 'news.id')
                ->whereNull('news_sub_categories.sub_category_id');
        }

        $newsInfo = $query->first();

        if (!$newsInfo) {
            abort(404, 'News not found');
        }

        // Get share count
        $currentUrl = url("/{$categorySlug}" . ($subcategory ? "/{$subcategorySlug}" : "") . "/{$newsSlug}");
        $apiUrl = 'https://count-server.sharethis.com/v2.0/get_counts?url=' . urlencode($currentUrl);

        try {
            $response = Http::get($apiUrl);
            $shareCounts = json_decode($response->getBody(), true);
            $smtc = isset($shareCounts['total']) ? $shareCounts['total'] : 0;
        } catch (\Exception $e) {
            $smtc = 0;
        }

        // Get SEO
        $seo = SeoModel::where('news_id', $newsInfo->id)->get();
        
        if(count($seo) < 1){
            $seo = [
                [
                    'title'=> $newsInfo->title ?? "breakingnewsbd.com",
                    'share_title'=> $newsInfo->title ?? "breakingnewsbd.com",
                    'description'=> $newsInfo->sort_description ?? "breakingnewsbd.com",
                    'keywords' => "breakingnewsbd.com",
                    'page_img' => $newsInfo->image ?? "http://breakingnewsbd.net/bangla-admin/public/images/2023-05-30/1685386994shahajan-mp-02.jpg",
                ]
            ];
        }

        // Update hit counter
        DB::table('news')->where('id', $newsInfo->id)->increment('hit_counter');

        return view('Pages.SingleNewsPage', [
            "Seo" => $seo,
            "st" => $smtc,
            "nid" => $newsInfo->id,
            'newsInfo' => $newsInfo,
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }
}