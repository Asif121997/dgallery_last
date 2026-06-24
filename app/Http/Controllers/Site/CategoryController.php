<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\OptionGroup;
use App\Models\Option;

use App\Models\Color;
use App\Models\Size;
use App\Models\OptionGroupsCategories;

use App\Models\ProductOptions;
use App\Models\ProductCategory;
use App\Models\Product;
class CategoryController extends Controller
{
    public function index($slug)
{

    // Kateqoriyanı tapırıq
    $category = Category::whereHas('categoryTranslations', function ($query) use ($slug) {
        $query->where('slug', $slug);
    })->active()->firstOrFail();

    // Kateqoriyaya aid product_id-lər
    $categoryIds = ProductCategory::where('category_id', $category->id)
        ->pluck('product_id')
        ->toArray();

    // Əsas məhsul query
    $products = Product::
        whereIn('id', $categoryIds); // ← Birinci kateqoriya filteri


   if (request()->has('filter')) {
       
       
    foreach(request()->filter as $gFilter){
        $pr_ids = ProductOptions::whereIn('option_id',$gFilter)->pluck('product_id');
        
        $products = $products->whereIn('id', $pr_ids);
    }
    

    
}



    // --- STOCK ---
    if (request()->stock == 'inStock') {
        $products = $products->where('stock', 1);
    } elseif (request()->stock == 'outStock') {
        $products = $products->where('stock', 0);
    }


    // --- SORT ---
    if (request()->sort == 'cheap') {
        $products = $products->orderBy('price', 'asc');
    } elseif (request()->sort == 'expensive') {
        $products = $products->orderBy('price', 'desc');
    } elseif (request()->sort == 'popular') {
        $products = $products->orderBy('show_count', 'desc');
    } elseif (request()->sort == 'sale') {
        $products = $products->orderBy('sale', 'asc');
    } elseif (request()->sort == 'new') {
        $products = $products->orderBy('new', 'desc');
    } else {
        $products = $products->orderBy('price', 'asc');
    }


    // --- PRICE RANGE ---
    if (request()->min_price) {
        $products = $products->where('price', '>=', request()->min_price);
    }

    if (request()->max_price) {
        $products = $products->where('price', '<=', request()->max_price);
    }
    $products = $products->active();

    // --- PAGINATION ---
    $count = request()->count ?? 12;

    if ($count === 'all') {
        $products = $products->get();
    } else {
        $products = $products->paginate($count)->withQueryString();
    }


    // Filtrlər üçün lazım olan məlumatlar
    $optionGroups = OptionGroupsCategories::
        where('category_id', $category->id)
        ->get();

    $maxPrice = Product::active()
        ->whereIn('id', $categoryIds)
        ->max('price');


    $colors = Color::get();
    $sizes = Size::where('category_id',$category->id)->get();

    $meta['title'] = $category->categoryTranslations->where('locale','en')->first()->title;
    $meta['description'] = $category->categoryTranslations->where('locale','en')->first()->description;
    
    $lang = [
        'ar' => '/'.$category->categoryTranslations->where('locale','ar')->first()->slug,    

        'ru' => '/ru/'.$category->categoryTranslations->where('locale','ru')->first()->slug,    
    ];
    
    if (request()->ajax()) {
        return view('components.products', compact('products'))->render();
    }
    return view('site.category', compact(
        'category',
        'products',
        'optionGroups',
        'maxPrice',
        'meta',
        'lang',

        'colors',
        'sizes',

    ));
}

}