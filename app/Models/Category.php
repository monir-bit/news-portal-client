<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [
        'name',
        'slug',
        'order',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    /**
     * Boot method to automatically generate slug when creating/updating category
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            // Generate slug from name if not provided or if name changed
            if (empty($category->slug) || $category->isDirty('name')) {
                $category->slug = static::generateUniqueSlug($category->name, $category->id);
            }
        });
    }

    /**
     * Generate unique slug from name
     */
    public static function generateUniqueSlug($name, $currentId = null)
    {
        // Use Laravel's Str::slug for transliteration
        $slug = Str::slug($name, '-', 'bn');
        
        // Fallback: if empty, create a simple slug
        if (empty($slug)) {
            $slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($name));
            $slug = trim($slug, '-');
        }
        
        // If still empty, use hash
        if (empty($slug)) {
            $slug = substr(md5($name), 0, 8);
        }

        // Make slug unique
        $originalSlug = $slug;
        $counter = 1;

        while (DB::table('categories')
            ->where('slug', $slug)
            ->when($currentId, function ($query) use ($currentId) {
                return $query->where('id', '!=', $currentId);
            })
            ->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Get the route for the category
     */
    public function getRouteAttribute()
    {
        $categorySlug = $this->slug ?? 'category-' . $this->id;
        return "/{$categorySlug}";
    }
}
