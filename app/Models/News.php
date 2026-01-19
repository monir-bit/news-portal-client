<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class News extends Model
{
    protected $table = 'news';
    
    protected $fillable = [
        'title',
        'caption',
        'sort_description',
        'category_id',
        'sub_category_id',
        'slug',
        'order',
        'proofreader',
        'image',
        'type',
        'timeline_id',
        'published',
        'latest',
        'news_marquee',
        'live_news',
        'reporter_id',
        'hit_counter',
        'author_id',
        'date',
    ];

    protected $casts = [
        'published' => 'boolean',
        'latest' => 'boolean',
        'news_marquee' => 'boolean',
        'live_news' => 'boolean',
        'date' => 'datetime',
    ];

    /**
     * Boot method to automatically generate slug when creating/updating news
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($news) {
            // Generate unique random slug (NanoID style) if not provided
            // Slug doesn't change when title changes - it's a permanent unique identifier
            if (empty($news->slug)) {
                $news->slug = static::generateUniqueSlug(null, $news->id);
            }
        });
    }

    /**
     * Generate unique 10 character random alphanumeric string (NanoID style)
     * Similar to Prothom Alo's hash ID (e.g., rdq5h5ifq3)
     */
    public static function generateUniqueSlug($title = null, $currentId = null)
    {
        // Characters for random string (alphanumeric lowercase)
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        
        // Generate random 10 character string
        do {
            $slug = '';
            for ($i = 0; $i < 10; $i++) {
                $slug .= $characters[random_int(0, $charactersLength - 1)];
            }
            
            // Check if slug already exists
            $exists = DB::table('news')
                ->where('slug', $slug)
                ->when($currentId, function ($query) use ($currentId) {
                    return $query->where('id', '!=', $currentId);
                })
                ->exists();
        } while ($exists);

        return $slug;
    }

    /**
     * Get the category that owns the news
     */
    public function category()
    {
        return DB::table('categories')->where('id', $this->category_id)->first();
    }

    /**
     * Get the subcategory that owns the news
     */
    public function subcategory()
    {
        if ($this->sub_category_id) {
            return DB::table('subcategories')->where('id', $this->sub_category_id)->first();
        }
        return null;
    }

    /**
     * Get the route for the news
     */
    public function getRouteAttribute()
    {
        $category = $this->category();
        if (!$category) {
            return null;
        }

        $categorySlug = $category->slug ?? 'category-' . $category->id;
        
        $subcategory = $this->subcategory();
        if ($subcategory) {
            $subcategorySlug = $subcategory->slug ?? 'subcategory-' . $subcategory->id;
            return "/{$categorySlug}/{$subcategorySlug}/{$this->slug}";
        }

        return "/{$categorySlug}/{$this->slug}";
    }
}
