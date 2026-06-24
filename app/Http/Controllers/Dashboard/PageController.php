<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Http\Request;
use Str;
use Auth;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('pages index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $rows = Page::orderby('id','desc')->get();
        return view('back.page.index',compact('rows'));
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        if (!auth()->user()->can('pages edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        if (!auth()->user()->can('pages edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('pages', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }

       

        Page::where('id', $page->id)->update([
            'img' => $imageName,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            PageTranslation::where('page_id', $page->id)->where('locale', $request->locale[$i])->update([
                    'name' => $request['name'][$i],
                    'text' => $request['text'][$i],
            ]);
        }

        return redirect()->route('pages.index')->with([
            'success' => 'Success',
            'text' => 'Page updated',
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
