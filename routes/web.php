<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LiveNewsController;
use App\Http\Controllers\LocalNewsController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SingleNewsController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\WeController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear', function () {
   Artisan::call('config:cache');
   Artisan::call('config:clear');
   Artisan::call('route:cache');
   Artisan::call('route:clear');
   Artisan::call('route:clear');
   Artisan::call('view:cache');
   Artisan::call('view:clear');
   return '<h1>Cache, Route, View cache .</h1>';
});

Route::get('/test', function (){
    return view('Pages.TestPage');
});
Route::get('/1', function (){
    return view('Pages.TestPage');
});
Route::get('/', [HomeController::class, "Page"]);
Route::get('/all', [HomeController::class, "Allvideo"]);
Route::get('/latest', [HomeController::class, "Latest"]);
Route::get('/latest-news', [\App\Http\Controllers\ArchiveController::class, "LatestNews"])->name('latest-news');

Route::get('/Category/National', function () {
    return view('Pages.CategoryPage');
});

Route::get('/LocalNews', [LocalNewsController::class,"Page"]);
Route::get('/get-trending-news/{id}', [TrendingController::class, "Page"]);

Route::get('/Archive', [\App\Http\Controllers\ArchiveController::class, "Archive"]);
Route::get('/search-archive', [\App\Http\Controllers\ArchiveController::class, "Page"]);
Route::get('/we',[WeController::class, "Page"]);

// Static pages - must come before dynamic slug routes
Route::get('/privacy-policy', [PrivacyController::class, "Page"]);
Route::get('/terms-and-condition',[TermsController::class, "Page"]);
Route::get('/advertise', [AdvertiseController::class, "Page"]);
Route::get('/communication',[CommunicationController::class,"Page"]);
Route::get('/about', [AboutController::class, "Page"]);
Route::get('/search/{title}', [SearchController::class, "Page"]);
Route::get('/images/{date}', [SubCategoryController::class, "imagedate"]);

// Redirect old ID-based URLs to new slug-based URLs (for backward compatibility)
Route::get('/get-news/{id}', function ($id) {
    $news = DB::table('news')->where('id', $id)->first();
    if (!$news) {
        abort(404);
    }
    
    // Get primary category from news_categories table
    $newsCategory = DB::table('news_categories')
        ->where('news_id', $id)
        ->first();
    
    if (!$newsCategory) {
        abort(404, 'Category not found for this news');
    }
    
    $category = DB::table('categories')->where('id', $newsCategory->category_id)->where('visible', 1)->first();
    if (!$category) {
        abort(404, 'Category not found');
    }
    
    // Generate slug if not exists
    if (empty($category->slug)) {
        $categorySlug = \App\Models\Category::generateUniqueSlug($category->name, $category->id);
        DB::table('categories')->where('id', $category->id)->update(['slug' => $categorySlug]);
    } else {
        $categorySlug = $category->slug;
    }
    
    // Get subcategory from news_sub_categories table
    $newsSubCategory = DB::table('news_sub_categories')
        ->where('news_id', $id)
        ->first();
    
    if ($newsSubCategory) {
        $subcategory = DB::table('subcategories')->where('id', $newsSubCategory->sub_category_id)->where('visible', 1)->first();
        if ($subcategory) {
            // Generate slug if not exists
            if (empty($subcategory->slug)) {
                $subcategorySlug = \App\Models\Subcategory::generateUniqueSlug($subcategory->name, $subcategory->id);
                DB::table('subcategories')->where('id', $subcategory->id)->update(['slug' => $subcategorySlug]);
            } else {
                $subcategorySlug = $subcategory->slug;
            }
            
            // Generate news slug if not exists (random alphanumeric)
            if (empty($news->slug)) {
                $newsSlug = \App\Models\News::generateUniqueSlug(null, $news->id);
                DB::table('news')->where('id', $news->id)->update(['slug' => $newsSlug]);
            } else {
                $newsSlug = $news->slug;
            }
            
            return redirect("/{$categorySlug}/{$subcategorySlug}/{$newsSlug}", 301);
        }
    }
    
    // Generate news slug if not exists (random alphanumeric)
    if (empty($news->slug)) {
        $newsSlug = \App\Models\News::generateUniqueSlug(null, $news->id);
        DB::table('news')->where('id', $news->id)->update(['slug' => $newsSlug]);
    } else {
        $newsSlug = $news->slug;
    }
    
    return redirect("/{$categorySlug}/{$newsSlug}", 301);
});

Route::get('/get-news-by-category/{id}', function ($id) {
    $category = DB::table('categories')->where('id', $id)->where('visible', 1)->first();
    if (!$category) {
        abort(404);
    }
    
    // Generate slug if not exists
    if (empty($category->slug)) {
        $categorySlug = \App\Models\Category::generateUniqueSlug($category->name, $category->id);
        DB::table('categories')->where('id', $category->id)->update(['slug' => $categorySlug]);
    } else {
        $categorySlug = $category->slug;
    }
    
    return redirect("/{$categorySlug}", 301);
});

Route::get('/get-news-by-sub-category/{id}', function ($id) {
    $subcategory = DB::table('subcategories')->where('id', $id)->where('visible', 1)->first();
    if (!$subcategory) {
        abort(404);
    }
    
    $category = DB::table('categories')->where('id', $subcategory->category_id)->first();
    if (!$category) {
        abort(404);
    }
    
    $categorySlug = $category->slug ?? 'category-' . $category->id;
    $subcategorySlug = $subcategory->slug ?? 'subcategory-' . $subcategory->id;
    return redirect("/{$categorySlug}/{$subcategorySlug}", 301);
});

// Slug-based routes for news (Prothom Alo style)
// IMPORTANT: Order matters - most specific routes must come LAST
// Format: /{category-slug}/{subcategory-slug}/{news-slug} (3 segments - news with subcategory)
Route::get('/{categorySlug}/{subcategorySlug}/{newsSlug}', [SingleNewsController::class, "showBySlug"]);

// Format: /{category-slug}/{segment} (2 segments - could be subcategory page or single news without subcategory)
Route::get('/{categorySlug}/{segment}', [CategoryController::class, "showBySlugSegment"]);

// Format: /{category-slug} (1 segment - category page)
Route::get('/{categorySlug}', [CategoryController::class, "showBySlug"]);
