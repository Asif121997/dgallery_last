<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = [
        'img',
        'datasheet',
        'category_id',
        'brand_id',
        'color_id',
        'store_id',
        'price',
        'discount_price',
        'wholesale_price',
        'diller_price',
        'special_price',
        'purchase_price',
        'percent',
        'review',
        'status',
        'new',
        'stock',
        'two_hand',
        'special',
        'featured',
        'limited',
        'sale',
        'home',
        'show_count',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $with = ['productTranslations'];


    public function productTranslations()
    {
        return $this->hasMany(ProductTranslation::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(ProductOptions::class, 'product_id', 'id');
    }

    public function optionList()
    {
        return $this->belongsToMany(Option::class, 'product_options', 'product_id', 'option_id');
    }


    public function sizeList()
    {
        return $this->belongsToMany(Size::class, 'product_size', 'product_id', 'size_id');
    }



    public function categoryList()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id')->orderBy('id','asc');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }


    public function colorList()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }


    

    
    public function scopeActive($query)
    {
        return $query->where('status','1');
    }
    
     public function scopeNew($query)
    {
        return $query->where('new','1');
    }

    public function scopeSale($query)
    {
        return $query->where('sale','1');
    }


    public function scopeHome($query)
    {
        return $query->where('home','1');
    }
    
    public function scopeTwo($query)
    {
        return $query->where('two_hand','1');
    }
    
    

    public function scopeFeatured($query)
    {
        return $query->where('featured','1');
    }
    
    public function getOrderedCategories()
    {
        $categories = $this->categories;

        if ($categories->isEmpty()) {
            return collect([]);
        }

        // Root (parent_id == null) tap
        $root = $categories->firstWhere('parent_id', null);
        if (!$root) {
            // Əgər root yoxdursa, sadəcə birinci category-ni qaytar
            return collect([$categories->first()]);
        }

        $ordered = collect([$root]);
        $current = $root;

        // Childları tap və düz ardıcıllıqla topla
        while (true) {
            $child = $categories->firstWhere('parent_id', $current->id);
            if (!$child) {
                break;
            }
            $ordered->push($child);
            $current = $child;
        }

        return $ordered;
    }

    
}
