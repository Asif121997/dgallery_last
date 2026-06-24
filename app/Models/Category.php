<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['categoryTranslations'];


    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::class, 'category_id', 'id');
    }
    
    
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }


    public function specialLatestProducts()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id')
            ->where('products.special', 1)
            ->orderByDesc('products.created_at')
            ->limit(12);
    }


   
    
    public function scopeActive($query)
    {
        return $query->where('status','1');
    }
    
    public function scopeOne($query)
    {
        return $query->where('row','1');
    }
    
    public function scopeTwo($query)
    {
        return $query->where('row','2');
    }
    
    public function scopeThree($query)
    {
        return $query->where('row','3');
    }


     // Sub-kateqoriyalar
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderby('order','asc')->active();
    }

    // Əgər sub-categorydirsə parent
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->orderby('order','asc');
    }

     public function fullSlug($locale)
    {
        $slug = optional($this->translations->where('locale', $locale)->first())->slug ?? $this->slug;

        if ($this->parent) {
            return $this->parent->fullSlug($locale) . '-' . $slug;
        }

        return $slug;
    }
    
    public function scopeShowhome($query)
    {
        return $query->where('show_home','1');
    }
    
    public function getFullPath($locale)
{
    $categories = collect();
    $category = $this;

    while ($category) {
        $categories->prepend($category->categoryTranslations->where('locale', $locale)->first());
        $category = $category->parent;
    }

    return $categories;
}


public function getParents()
    {
        $parents = collect([]);
        $category = $this;

        while ($category->parent) {
            $parents->prepend($category->parent); // başa əlavə et ki sıra düz olsun
            $category = $category->parent;
        }

        return $parents;
    }
    
    public function getBreadcrumb()
    {
        $categories = collect([]);
        $category = $this;

        // ən altdan yuxarıya çıxırıq
        while ($category) {
            $categories->prepend($category); // PREPEND → başa əlavə edir, sıra düz qalır
            $category = $category->parent;
        }

        return $categories;
    }
    
}
