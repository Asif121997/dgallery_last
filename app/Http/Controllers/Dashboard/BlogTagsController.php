<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\BlogTags;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Str;
use Auth;

class BlogTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = BlogTags::get();
        return view('back.blogTags.index',compact('rows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
     
    public function create(){
        return view('back.blogTags.add');
    }
    
    public function store(Request $request){
        


        

        

        $id = BlogTags::create([
            'name'=>$request->name,
        ])->id;

        
        return redirect()->route('blogTags.index')->with(['alertTitle' => 'Təbriklər', 'alertContent' => 'Məlumatlar uğurla əlavə edildi.', 'alertType' => 'success']);
    }
    public function edit($id)
    {
        $blogTags = BlogTags::find($id);
        
        return view('back.blogTags.edit',compact('blogTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
           


            BlogTags::where('id',$id)->update([
                'name'=>$request->name,
                'updated_at'=>date('Y-m-d h:i:s'),
            ]);
            
            return redirect()->route('blogTags.index')->with(['alertType'=>'success','alertTitle'=>'Təbriklər','alertContent'=>'Məlumatlar uğurla yeniləndi.']);
        
    }
    
    public function destroy($id){
        BlogTags::where('id',$id)->delete();
        return redirect()->route('blogTags.index')->with(['alertTitle'=>'Təbriklər','alertContent'=>'Silindi','alertType'=>'success']);
    }
}
