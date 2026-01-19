<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class Subcategory extends Model
{
    protected $table = 'subcategories';
    
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    /**
     * Boot method to automatically generate slug when creating/updating subcategory
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($subcategory) {
            // Generate slug from name if not provided or if name changed
            if (empty($subcategory->slug) || $subcategory->isDirty('name')) {
                $subcategory->slug = static::generateUniqueSlug($subcategory->name, $subcategory->id);
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

        while (DB::table('subcategories')
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
     * Get the route for the subcategory
     */
    public function getRouteAttribute()
    {
        $category = DB::table('categories')->where('id', $this->category_id)->first();
        if (!$category) {
            return null;
        }
        
        $categorySlug = $category->slug ?? 'category-' . $category->id;
        $subcategorySlug = $this->slug ?? 'subcategory-' . $this->id;
        return "/{$categorySlug}/{$subcategorySlug}";
    }
}
