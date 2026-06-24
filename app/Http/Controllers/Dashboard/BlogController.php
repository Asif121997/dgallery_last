<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\BlogCategory;
use App\Models\BlogTags;
use App\Models\Category;
use App\Models\BlogTagsPivot;
use Illuminate\Http\Request;
use Str;
use Auth;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('blogs index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $rows = Blog::orderby('id','desc')->get();
        return view('back.blogs.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        if (!auth()->user()->can('blogs create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $categories = BlogCategory::get();
        $productCategories = Category::whereNull('parent_id')
                ->with('children')
                ->get();
        $tags = BlogTags::get();

        return view('back.blogs.add',compact('categories','tags','productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('blogs create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('blogs', $imageName, 'public');
        }else{
            $imageName = '';
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }
        $blog_id = Blog::create([
            'img' => $imageName,
            'category_id' => $request->category_id,
            'product_category_id' => $request->product_category_id,
            'status' => $status,
            'user_id' => Auth::user()->id,
        ])->id;

        if ($blog_id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                BlogTranslation::create([
                    'blog_id' => $blog_id,
                    'name' => $request['name'][$i],
                    'short_text' => $request['short_text'][$i],
                    'text' => $request['text'][$i],
                    'title' => $request['title'][$i],
                    'description' => $request['description'][$i],
                    'keywords' => $request['keywords'][$i],
                    'slug' => Str::slug($request['name'][$i]),
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        if($request->tag_id){
            for($s=0; $s< count($request->tag_id);$s++){
                BlogTagsPivot::create([
                    'blog_id' => $blog_id,
                    'tag_id' => $request->tag_id[$s],
                ]);
            }
        }

        return redirect()->route('blogs.index')->with([
            'success' => 'Success',
            'text' => 'Blog created',
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
    public function edit(Blog $blog)
    {
        if (!auth()->user()->can('blogs edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $categories = BlogCategory::get();
        $tags = BlogTags::get();
        $blogTagsList = BlogTagsPivot::where('blog_id',$blog->id)->pluck('tag_id')->toArray();
        
        $productCategories = Category::whereNull('parent_id')
                ->with('children')
                ->get();

        return view('back.blogs.edit',compact('blog','categories','tags','blogTagsList','productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if (!auth()->user()->can('blogs edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('blogs', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        Blog::where('id', $blog->id)->update([
            'img' => $imageName,
            'category_id' => $request->category_id,
            'product_category_id' => $request->product_category_id,
            'status' => $status,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            BlogTranslation::where('blog_id', $blog->id)->where('locale', $request->locale[$i])->update([
                    'name' => $request['name'][$i],
                    'short_text' => $request['short_text'][$i],
                    'text' => $request['text'][$i],
                    'title' => $request['title'][$i],
                    'description' => $request['description'][$i],
                    'keywords' => $request['keywords'][$i],
                    'slug' => Str::slug($request['name'][$i]),
            ]);
        }

        BlogTagsPivot::where('blog_id',$blog->id)->delete();

            if($request->tag_id){
                for($s=0; $s< count($request->tag_id);$s++){
                    BlogTagsPivot::create([
                        'blog_id' => $blog->id,
                        'tag_id' => $request->tag_id[$s],
                    ]);
                }
            }
        return redirect()->route('blogs.index')->with([
            'success' => 'Success',
            'text' => 'Blog updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (!auth()->user()->can('blogs delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with([
            'success' => 'Success',
            'text' => 'Blog successfully deleted.',
        ]);
    }

    public function status_change(){
        


        Blog::where('id',request()->blog_id)->update([
            'status' => request()->status,
        ]);

        return true;
    }
}
