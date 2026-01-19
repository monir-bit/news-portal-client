<?php
/**
 * URL Migration Debugging Script
 * Run this script to check if newsUrl is being generated correctly
 * 
 * Usage: php debug_url_issue.php
 */

require __DIR__ . '/bangla-admin/vendor/autoload.php';

$app = require_once __DIR__ . '/bangla-admin/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== URL Migration Debugging Script ===\n\n";

// Check 1: News with slugs
echo "1. Checking News Slugs:\n";
echo str_repeat("-", 50) . "\n";
$newsWithoutSlug = DB::table('news')
    ->where('published', 1)
    ->where(function($query) {
        $query->whereNull('slug')
              ->orWhere('slug', '');
    })
    ->count();

echo "News without slug: {$newsWithoutSlug}\n";

$newsWithSlug = DB::table('news')
    ->where('published', 1)
    ->whereNotNull('slug')
    ->where('slug', '!=', '')
    ->count();

echo "News with slug: {$newsWithSlug}\n\n";

// Check 2: Category slugs
echo "2. Checking Category Slugs:\n";
echo str_repeat("-", 50) . "\n";
$categories = DB::table('categories')
    ->where('visible', 1)
    ->select('id', 'name', 'slug')
    ->limit(5)
    ->get();

foreach ($categories as $cat) {
    echo "ID: {$cat->id}, Name: {$cat->name}, Slug: " . ($cat->slug ?? 'NULL') . "\n";
}
echo "\n";

// Check 3: Sample news URL generation
echo "3. Testing News URL Generation:\n";
echo str_repeat("-", 50) . "\n";
$sampleNews = DB::table('news')
    ->where('published', 1)
    ->whereNotNull('slug')
    ->limit(3)
    ->get();

foreach ($sampleNews as $news) {
    // Get primary category
    $category = DB::table('news_categories')
        ->join('categories', 'categories.id', 'news_categories.category_id')
        ->where('news_categories.news_id', $news->id)
        ->select('categories.slug', 'categories.id', 'categories.name')
        ->first();
    
    // Get subcategory
    $subcategory = DB::table('news_sub_categories')
        ->join('subcategories', 'subcategories.id', 'news_sub_categories.sub_category_id')
        ->where('news_sub_categories.news_id', $news->id)
        ->select('subcategories.slug', 'subcategories.id')
        ->first();
    
    $newsUrl = '#';
    if ($category) {
        $categorySlug = $category->slug ?? 'category-' . $category->id;
        $newsSlug = $news->slug ?? 'news-' . $news->id;
        
        if ($subcategory) {
            $subcategorySlug = $subcategory->slug ?? 'subcategory-' . $subcategory->id;
            $newsUrl = "/{$categorySlug}/{$subcategorySlug}/{$newsSlug}";
        } else {
            $newsUrl = "/{$categorySlug}/{$newsSlug}";
        }
    }
    
    echo "News ID: {$news->id}\n";
    echo "  Title: " . substr($news->title, 0, 50) . "...\n";
    echo "  Slug: {$news->slug}\n";
    echo "  Category: {$category->name} (slug: " . ($category->slug ?? 'NULL') . ")\n";
    echo "  Subcategory: " . ($subcategory ? "Yes (slug: " . ($subcategory->slug ?? 'NULL') . ")" : "No") . "\n";
    echo "  Generated URL: {$newsUrl}\n";
    echo "\n";
}

// Check 4: API endpoint test
echo "4. Testing API Endpoint:\n";
echo str_repeat("-", 50) . "\n";
$testCategory = DB::table('categories')
    ->where('visible', 1)
    ->whereNotNull('slug')
    ->first();

if ($testCategory) {
    echo "Testing category: {$testCategory->name} (slug: {$testCategory->slug})\n";
    echo "API URL would be: /bangla-admin/api/{$testCategory->slug}/20/0\n";
    echo "Expected response should contain 'newsUrl' in each news item\n";
} else {
    echo "No category with slug found for testing\n";
}

echo "\n=== Debugging Complete ===\n";
echo "\nNext Steps:\n";
echo "1. Check if news slugs are generated\n";
echo "2. Check if category slugs exist\n";
echo "3. Test API endpoint manually\n";
echo "4. Check browser console for JavaScript errors\n";
