<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Category;
use App\Models\Store;
use App\Models\ProductImages;
use App\Models\Brand;
use App\Models\Size;
use App\Models\ProductSize;
use App\Models\Color;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\OptionGroup;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('product index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Product::orderby('id','desc');
        
        if(request()->name){
            $search = request()->name;
            $rows = $rows->where(function ($q) use ($search) {
                $q->whereHas('productTranslations', function ($q2) use ($search) {
                    $q2->where('name', 'like', '%' . $search . '%');
                });
            });
        }
        
        if(isset(request()->stock) and request()->stock != 100){
            
            
            $rows = $rows->where('stock',request()->stock);
        }
        
        
        
        $rows = $rows->get();

        return view('back.products.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('product create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();

        $colors = Color::get();
        $sizes = Size::get();
        
        $stores = Store::get();
        
        $brands = Brand::active()->get();

        $optionGroups = OptionGroup::active()->get();


        return view('back.products.add',compact('categories','colors','optionGroups','brands','stores','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       
        
        if (!auth()->user()->can('product create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('products', $imageName, 'public');
        }else{
            $imageName = '';
        }
        
        if ($request->hasFile('datasheet')) {
            $datasheet = $request->file('datasheet');
            $datasheetName = time() . '_' . $datasheet->getClientOriginalName();
            $datasheetPath = $datasheet->storeAs('products', $datasheetName, 'public');
        }else{
            $datasheetName = '';
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        if (filled($request->featured)) {
            $featured = '1';
        } else {
            $featured = '0';
        }

        if (filled($request->sale)) {
            $sale = '1';
        } else {
            $sale = '0';
        }

        if (filled($request->special)) {
            $special = '1';
        } else {
            $special = '0';
        }

        if (filled($request->home)) {
            $home = '1';
        } else {
            $home = '0';
        }

        if (filled($request->stock)) {
            $stock = '1';
        } else {
            $stock = '0';
        }

        if (filled($request->new)) {
            $new = '1';
        } else {
            $new = '0';
        }
        
        if (filled($request->two_hand)) {
            $two_hand = '1';
        } else {
            $two_hand = '0';
        }
        
        if (filled($request->limited)) {
            $limited = '1';
        } else {
            $limited = '0';
        }

        $product = Product::create([
            'img' => $imageName,
            'datasheet' => $datasheetName,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'review' => $request->review,
            'status' => $status,
            'featured' => $featured,
            'sale' => $sale,
            'home' => $home,
            'special' => $special,
            'stock' => $stock,
            'new' => $new,
            'limited' => $limited,
            'two_hand' => $two_hand,
        ]);

        if ($product) {
            for ($i = 0; $i < count($request->locale); $i++) {
                
                if(!empty($request['name'][$i])){
                $slug = Str::slug($request['name'][$i]);
                do {
                    $exists = ProductTranslation::where('slug', $slug)->exists();
        
                    if ($exists) {
                        $slug = $slug . '-1';
                    }
        
                } while ($exists);
            }else{
                $slug = '';
            }
                ProductTranslation::create([
                    'product_id' => $product->id,
                    'name' => $request['name'][$i],
                    'overview' => $request['overview'][$i],
                    'description' => $request['description'][$i],
                    'page_title' => $request['page_title'][$i],
                    'page_description' => $request['page_description'][$i],
                    'page_keywords' => $request['page_keywords'][$i],
                    'slug' => $slug,
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        if (filled($request->category_id)) {
            $product->categoryList()->sync($request->category_id);
        }


        if (filled($request->option_id)) {
            $product->optionList()->sync($request->option_id);
        }


       


        

        if ($request['gallery']) {
            foreach($request['gallery'] as $gallery){
                $image = $gallery;
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('products', $imageName, 'public');

                ProductImages::create([
                    'product_id' => $product->id,
                    'img' => $imageName,
                ]);
            }
        }

        return redirect()->route('products.index')->with([
            'success' => 'Success',
            'text' => 'Product created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (!auth()->user()->can('product edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();
        
        $stores = Store::get();

        $productCategoryIds = ProductCategory::where('product_id',$product->id)->pluck('category_id')->toArray();


        $productSizeIds = ProductSize::where('product_id',$product->id)->pluck('size_id')->toArray();


        $productColorIds = ProductColor::where('product_id',$product->id)->pluck('color_id')->toArray();

        $colors = Color::get();

        $optionGroups = OptionGroup::active()->get();

        $option_IDS = $product->options->pluck('option_id')->toArray();

        $brands = Brand::active()->get();


        $sizes = Size::get();

        return view('back.products.edit',compact('categories','colors','productCategoryIds','optionGroups','product','option_IDS','productColorIds','brands','stores','sizes','productSizeIds'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if (!auth()->user()->can('product edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
 
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('products', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }
        
        
        if ($request->hasFile('datasheet')) {
            $datasheet = $request->file('datasheet');
            $datasheetName = time() . '_' . $datasheet->getClientOriginalName();
            $datasheetPath = $datasheet->storeAs('products', $datasheetName, 'public');
        }else if($request->old_datasheet){
            $datasheetName = $request->old_datasheet;
        }else{
            $datasheetName = '';
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        if (filled($request->featured)) {
            $featured = '1';
        } else {
            $featured = '0';
        }

        if (filled($request->sale)) {
            $sale = '1';
        } else {
            $sale = '0';
        }

        if (filled($request->special)) {
            $special = '1';
        } else {
            $special = '0';
        }

        if (filled($request->home)) {
            $home = '1';
        } else {
            $home = '0';
        }

        if (filled($request->stock)) {
            $stock = '1';
        } else {
            $stock = '0';
        }

        if (filled($request->new)) {
            $new = '1';
        } else {
            $new = '0';
        }
        
        if (filled($request->two_hand)) {
            $two_hand = '1';
        } else {
            $two_hand = '0';
        }
        
        if (filled($request->limited)) {
            $limited = '1';
        } else {
            $limited = '0';
        }

        Product::where('id', $product->id)->update([
            'img' => $imageName,
            'datasheet' => $datasheetName,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'wholesale_price' => $request->wholesale_price,
            'discount_price' => $request->discount_price,
            'diller_price' => $request->diller_price,
            'special_price' => $request->special_price,
            'purchase_price' => $request->purchase_price,
            'color_id' => $request->color_id,
            'review' => $request->review,
            'status' => $status,
            'featured' => $featured,
            'sale' => $sale,
            'stock' => $stock,
            'home' => $home,
            'percent' => $request->percent,
            'store_id' => $request->store_id,
            'special' => $special,
            'new' => $new,
            'two_hand' => $two_hand,
            'limited' => $limited,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            if(!empty($request['name'][$i])){
                $slug = Str::slug($request['name'][$i]);
                do {
                    $exists = ProductTranslation::where('slug', $slug)->where('product_id','!=',$product->id)->exists();
        
                    if ($exists) {
                        $slug = $slug . '-1';
                    }
        
                } while ($exists);
            }else{
                $slug = '';
            }
            
            
            
                
                
                
               
            ProductTranslation::where('product_id', $product->id)->where('locale', $request->locale[$i])->update([
                    'name' => $request['name'][$i],
                    'overview' => $request['overview'][$i],
                    'description' => $request['description'][$i],
                    'page_title' => $request['page_title'][$i],
                    'page_description' => $request['page_description'][$i],
                    'page_keywords' => $request['page_keywords'][$i],
                    'slug' => $slug,
            ]);
        }

        if (filled($request->option_id)) {
            $product->optionList()->sync($request->option_id);
        }

        if (filled($request->category_id)) {
            $product->categoryList()->sync($request->category_id);
        }


        if (filled($request->size_id)) {
            $product->sizeList()->sync($request->size_id);
        }


        

        if (!empty($request['all_galleries']) and $request['current_galleries']) {
            $diff = array_diff($request['all_galleries'], $request['current_galleries']);
            foreach ($diff as $dif) {
                ProductImages::where('id', $dif)->delete();
            }
        } else if (empty($request['current_galleries']) and !empty($request['all_galleries'])) {
            foreach ($request['all_galleries'] as $dif) {
                ProductImages::where('id', $dif)->delete();
            }
        }

        if ($request['gallery']) {
            foreach($request['gallery'] as $gallery){
                $image = $gallery;
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('products', $imageName, 'public');

                ProductImages::create([
                    'product_id' => $product->id,
                    'img' => $imageName,
                ]);
            }
        }

        return redirect()->route('products.index')->with([
            'success' => 'Success',
            'text' => 'Product updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!auth()->user()->can('product delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $product->delete();

        return redirect()->route('products.index')->with([
            'success' => 'Success',
            'text' => 'Product successfully deleted.',
        ]);
    }

    public function status_change(){
        


        Product::where('id',request()->product_id)->update([
            'status' => request()->status,
        ]);

        return true;
    }
    
    public function stock_change(){
        


        Product::where('id',request()->product_id)->update([
            'stock' => request()->stock,
        ]);

        return true;
    }
}
