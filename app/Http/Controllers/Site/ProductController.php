<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Settings;
use App\Models\OneClickOrder;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function list(){
        $brands = Brand::active()->orderBy('name','asc')->get();
        $products = Product::active();
        
        // --- STOCK ---
        if (request()->stock == 'inStock') {
            $products = $products->where('stock', 1);
        } elseif (request()->stock == 'outStock') {
            $products = $products->where('stock', 0);
        }
        
        if(request()->brand){
            $products= $products->whereIn('brand_id',request()->brand);
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
        
        // --- PAGINATION ---
        $count = request()->count ?? 12;
    
        if ($count === 'all') {
            $products = $products->get();
        } else {
            $products = $products->paginate($count)->withQueryString();
        }
        
        $maxPrice = Product::active()->max('price');
        
        $lang = [
            'az' => '/mehsullar',
            'ru' => '/ru/produkty',
        ];
        return view('site.product_list', compact('products','brands','maxPrice','lang'));
    }

    public function inner($slug = null)
{
    // Məhsul
    $product = Product::whereHas('productTranslations', function ($query) use ($slug) {
        $query->where('slug', $slug);
    })->active()->firstOrFail();

    // baxış sayı
    $product->increment('show_count');

    // Məhsulun kateqoriyaları (ən dərin əvvəl)
    $categories = Category::whereIn(
        'id',
        ProductCategory::where('product_id', $product->id)->pluck('category_id')
    )
    ->with('parent')
    ->orderByDesc('id')
    ->get();

    $similarProducts = collect();
    $usedProductIds = collect([$product->id]);

    foreach ($categories as $category) {

        $currentCategory = $category;

        while ($currentCategory && $similarProducts->count() < 12) {

            $productIds = ProductCategory::where('category_id', $currentCategory->id)
                ->whereNotIn('product_id', $usedProductIds)
                ->pluck('product_id');

            if ($productIds->isNotEmpty()) {

                $products = Product::active()
                    ->whereIn('id', $productIds)
                    ->inRandomOrder()
                    ->limit(12 - $similarProducts->count())
                    ->get();

                $similarProducts = $similarProducts->merge($products);
                $usedProductIds = $usedProductIds->merge($products->pluck('id'));
            }

            // bir pillə yuxarı qalx
            $currentCategory = $currentCategory->parent;
        }

        if ($similarProducts->count() >= 12) {
            break;
        }
    }

    // Breadcrumbs
    $breadcrumbs = $product->getOrderedCategories();

    // Dil linkləri
    $lang = [

        'az' => '/mehsul/' . optional($product->productTranslations->where('locale', 'az')->first())->slug,
        'en' => '/en/product/' . optional($product->productTranslations->where('locale', 'en')->first())->slug,
        'ru' => '/ru/produkt/' . optional($product->productTranslations->where('locale', 'ru')->first())->slug,
    ];
    $meta['title'] = $product->productTranslations->where('locale','az')->first()->page_title;
    $meta['description'] = $product->productTranslations->where('locale','az')->first()->page_description;
    
    
    return view(
        'site.products.product',
        compact('product', 'lang', 'similarProducts', 'breadcrumbs','meta')
    );
}

    
    
    public function showAjax($id){
       $product = Product::with('images', 'category') // varsa əlaqələr əlavə et
        ->findOrFail($id);
        
        if(Auth::guard('customer')->check()){
            $customer_check = 1;
            $user_type = Auth::guard('customer')->user()->type;
        }else{
            $customer_check = 0;
            $user_type = '';
        }
        
        $globalSettings = Settings::first();
        
        if($globalSettings->discount_check == 1){
            $discount_check = 1;
           
        }else{
            $discount_check = 0;
        }

    return response()->json([
        'id' => $product->id,
        'name' => $product->productTranslations->where('locale','az')->first()->name,
        'description' => html_entity_decode($product->productTranslations->where('locale','az')->first()->overview),
        'price' => $product->price,
        'color' => $product->color->color_code,
        'color_id' => $product->color->id,
        'wholesale_price' => $product->wholesale_price,
        'diller_price' => $product->diller_price,
        'special_price' => $product->special_price,
        'discount_price' => $product->discount_price,
        'discount_check' => $discount_check,
        'customer_check' => $customer_check,
        'user_type' => $user_type,
        'url' => route('product_inner_az',['slug'=>$product->productTranslations->where('locale','az')->first()->slug]),
        'stock' => $product->stock,
        'star' => $product->review,
        'main_image' => asset('storage/products/'.$product->img), // əsas şəkil
        'images' => $product->images->map(function($img){
            return asset('storage/products/'.$img->img);
        }),
    ]);
    }
    
    
    public function oneclickpost(Request $request)
{
    $request->validate([
        'phone' => [
            'required',
            'regex:/^(?:\+994|994|0)(50|51|55|70|77|99)\d{7}$/'
        ],
        'product_id' => 'required|exists:products,id'
    ], [
        'phone.required' => 'Telefon nömrəsi boş ola bilməz',
        'phone.regex' => 'Telefon nömrəsi düzgün formatda deyil'
    ]);

    $phone = preg_replace('/\D/', '', $request->phone); // Normalize

    if (str_starts_with($phone, '0')) {
        $phone = '994' . substr($phone, 1);
    }
    $phone = '+' . $phone;
    
    $exists = OneClickOrder::where('phone', $phone)
        ->where('created_at', '>=', now()->subDay())
        ->exists();

    if ($exists) {
        return redirect()->back()->with('error', 'Bu nömrə ilə artıq sifariş göndərilib');
    }

    OneClickOrder::create([
        'product_id' => $request->product_id,
        'phone'      => $phone,
    ]);

    return redirect()->back()->with('success', 'Sifariş uğurla qəbul edildi');
}
}
