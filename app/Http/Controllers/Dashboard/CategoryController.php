<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OptionGroup;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('category index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Category::whereNull('parent_id')
                ->with('children')
                ->orderby('id','desc')
                ->get();

        return view('back.categories.index',compact('rows'));
    }
    
    public function childCategory(Category $category)
    {

        if (!auth()->user()->can('category index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
        

        $rows = Category::where('parent_id',$category->id)
                ->with('children')
                ->get();

        return view('back.categories.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('category create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $categories = Category::whereNull('parent_id')
        ->active()
                ->with('children')
                ->get();

        return view('back.categories.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('category create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('categories', $imageName, 'public');
        }else{
            $imageName = '';
        }
        
        
        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $iconimageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('categories', $iconimageName, 'public');
        }else{
            $iconimageName = '';
        }


        if($request->parent_id == 0){
            $parent_id = null;
        }else{
            $parent_id = $request->parent_id;
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        if (filled($request->home)) {
            $home = '1';
        } else {
            $home = '0';
        }
        
        if (filled($request->show_home)) {
            $show_home = '1';
        } else {
            $show_home = '0';
        }

        $category_id = Category::create([
            'img' => $imageName,
            'icon_image' => $iconimageName,
            'parent_id' => $parent_id,
            'status' => $status,
            'home' => $home,
            'row' => $request->row,
            'show_home' => $show_home,
        ])->id;

        if ($category_id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                
                if(!empty($request['name'][$i])){
                    if($parent_id != 0){
                        $parentCategory = CategoryTranslation::where('locale',$request->locale[$i])->where('category_id',$parent_id)->first();
                        $slug = $parentCategory->slug.'-'.Str::slug($request['name'][$i]);
                    }else{
                        $slug = Str::slug($request['name'][$i]);
                    }
                }else{
                    $slug = '';
                }

                
                CategoryTranslation::create([
                    'category_id' => $category_id,
                    'name' => $request['name'][$i],
                    'title' => $request['title'][$i],
                    'description' => $request['description'][$i],
                    'banner_text' => $request['banner_text'][$i],
                    'banner_discount_text' => $request['banner_discount_text'][$i],
                    'keywords' => $request['keywords'][$i],
                    'slug' => $slug,
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        return redirect()->route('categories.index')->with([
            'success' => 'Success',
            'text' => 'Category created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if (!auth()->user()->can('category edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $categories =  Category::whereNull('parent_id')
                ->where('id','!=',$category->id)->active()
                ->with('children')
                ->get();


        return view('back.categories.edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if (!auth()->user()->can('category edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('categories', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }
        
        
        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $iconimageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('categories', $iconimageName, 'public');
        }else{
            $iconimageName = $request->old_icon_img;
        }



        if($request->parent_id == 0){
            $parent_id = null;
        }else{
            $parent_id = $request->parent_id;
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        if (filled($request->home)) {
            $home = '1';
        } else {
            $home = '0';
        }
        
        if (filled($request->show_home)) {
            $show_home = '1';
        } else {
            $show_home = '0';
        }

        
        Category::where('id', $category->id)->update([
            'img' => $imageName,
            'icon_image' => $iconimageName,
            'parent_id' => $parent_id,
            'status' => $status,
            'home' => $home,
            'row' => $request->row,
            'show_home' => $show_home,
        ]);



        for ($i = 0; $i < count($request->locale); $i++) {

            if(!empty($request['name'][$i])){
                    if($parent_id != 0){
                        $parentCategory = CategoryTranslation::where('locale',$request->locale[$i])->where('category_id',$parent_id)->first();
                        $slug = $parentCategory->slug.'-'.Str::slug($request['name'][$i]);
                    }else{
                        $slug = Str::slug($request['name'][$i]);
                    }
                }else{
                    $slug = '';
                }
            CategoryTranslation::where('category_id', $category->id)->where('locale', $request->locale[$i])->update([
                'category_id' => $category->id,
                'name' => $request['name'][$i],
                'title' => $request['title'][$i],
                'banner_text' => $request['banner_text'][$i],
                'banner_discount_text' => $request['banner_discount_text'][$i],
                'description' => $request['description'][$i],
                'keywords' => $request['keywords'][$i],
                'slug' => $slug,
            ]);
        }

        return redirect()->route('categories.index')->with([
            'success' => 'Success',
            'text' => 'Category updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!auth()->user()->can('category delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $category->delete();

        return redirect()->route('categories.index')->with([
            'success' => 'Success',
            'text' => 'Category successfully deleted.',
        ]);
    }

    public function updateOrder(){
        // Retrieve the new row order from the request
        $newOrder = request()->input('order');
        // Update your database or data source with the new row order
        foreach ($newOrder as $index => $itemId) {
            // Calculate the correct order value based on the page and number of items per page
            $correctOrder = $index + (request()->input('start', 0) / request()->input('length', 10));

            Category::where('id', $itemId)->update(['order' => $index]);
        }
        return response()->json(['success' => true]);
    }
    
    public function optionGroups(){
        $category = request()->category;
        
        $rows = OptionGroup::where('category_id',$category)->orderByDesc('order')->get();
        
        return view('back.option_groups.index',compact('rows'));
    }
}
