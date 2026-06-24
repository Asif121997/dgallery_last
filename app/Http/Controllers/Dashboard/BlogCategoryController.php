<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Str;
use Auth;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = BlogCategory::get();
        return view('back.blogcategory.index',compact('rows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
     
    public function create(){
        return view('back.blogcategory.add');
    }
    
    public function store(Request $request){
        


        

        

        $id = BlogCategory::create([
            'name'=>$request->name,
        ])->id;

        
        return redirect()->route('blogCategory.index')->with(['alertTitle' => 'Təbriklər', 'alertContent' => 'Məlumatlar uğurla əlavə edildi.', 'alertType' => 'success']);
    }
    public function edit(BlogCategory $blogCategory)
    {
        
        
        return view('back.blogcategory.edit',compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        
           


            $blogCategory->update([
                'name'=>$request->name,
                'updated_at'=>date('Y-m-d h:i:s'),
            ]);
            
            return redirect()->route('blogCategory.index')->with(['alertType'=>'success','alertTitle'=>'Təbriklər','alertContent'=>'Məlumatlar uğurla yeniləndi.']);
        
    }
    
    public function destroy($id){
        BlogCategory::where('id',$id)->delete();
        return redirect()->route('blogCategory.index')->with(['alertTitle'=>'Təbriklər','alertContent'=>'Silindi','alertType'=>'success']);
    }
}
