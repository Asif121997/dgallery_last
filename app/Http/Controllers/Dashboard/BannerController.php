<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerTranslation;
use Illuminate\Http\Request;
use Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('banner index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Banner::get();

        return view('back.banners.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('banner create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.banners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('banner create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('banners', $imageName, 'public');
        }else{
            $imageName = '';
        }


        

        

        $banner_id = Banner::create([
            'img' => $imageName,
            'row' => $request->row,
            'date' => $request->date,
        ])->id;

        if ($banner_id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                BannerTranslation::create([
                    'banner_id' => $banner_id,
                    'name' => $request['name'][$i],
                    'special_title' => $request['special_title'][$i],
                    'text' => $request['text'][$i],
                    'btn_text' => $request['btn_text'][$i],
                    'btn_link' => $request['btn_link'][$i],
                    'badge_text' => $request['badge_text'][$i],
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        return redirect()->route('banners.index')->with([
            'success' => 'Success',
            'text' => 'Banner created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
       if (!auth()->user()->can('banner edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        if (!auth()->user()->can('banner edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('banners', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        Banner::where('id', $banner->id)->update([
            'img' => $imageName,
            'row' => $request->row,
            'date' => $request->date,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            BannerTranslation::where('banner_id', $banner->id)->where('locale', $request->locale[$i])->update([
                    
                    'name' => $request['name'][$i],
                    'special_title' => $request['special_title'][$i],
                    'text' => $request['text'][$i],
                    'btn_text' => $request['btn_text'][$i],
                    'btn_link' => $request['btn_link'][$i],
                    'badge_text' => $request['badge_text'][$i],
            ]);
        }

        return redirect()->route('banners.index')->with([
            'success' => 'Success',
            'text' => 'Banner updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if (!auth()->user()->can('banner delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $banner->delete();

        return redirect()->route('banners.index')->with([
            'success' => 'Success',
            'text' => 'Banner successfully deleted.',
        ]);
    }
}
