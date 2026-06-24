<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderTranslation;
use Illuminate\Http\Request;
use Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('sliders index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Slider::orderby('id','desc')->get();

        return view('back.sliders.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('sliders create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.sliders.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('sliders create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('sliders', $imageName, 'public');
        }else{
            $imageName = '';
        }


        if ($request->hasFile('image_2')) {
            $image_2 = $request->file('image_2');
            $imageName_2 = time() . '_' . $image_2->getClientOriginalName();
            $imagePath_2 = $image_2->storeAs('sliders', $imageName_2, 'public');
        }else{
            $imageName_2 = '';
        }


        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }
        $slider_id = Slider::create([
            'img' => $imageName,
            'image_2' => $imageName_2,
            'status' => $status,
        ])->id;

        if ($slider_id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                SliderTranslation::create([
                    'slider_id' => $slider_id,
                    'title' => $request['title'][$i],
                    'description' => $request['description'][$i],
                    'alert_text' => $request['alert_text'][$i],
                    'first_btn_text' => $request['first_btn_text'][$i],
                    'first_btn_link' => $request['first_btn_link'][$i],
                    'last_btn_text' => $request['last_btn_text'][$i],
                    'last_btn_link' => $request['last_btn_link'][$i],
                    'slug' => Str::slug($request['title'][$i]),
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        return redirect()->route('sliders.index')->with([
            'success' => 'Success',
            'text' => 'Slider created',
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
    public function edit(Slider $slider)
    {
        if (!auth()->user()->can('sliders edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }


        return view('back.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        if (!auth()->user()->can('sliders edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('sliders', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        Slider::where('id', $slider->id)->update([
            'img' => $imageName,
            'status' => $status,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            SliderTranslation::where('slider_id', $slider->id)->where('locale', $request->locale[$i])->update([
                    'title' => $request['title'][$i],
                    'description' => $request['description'][$i],
                    'alert_text' => $request['alert_text'][$i],
                    'first_btn_text' => $request['first_btn_text'][$i],
                    'first_btn_link' => $request['first_btn_link'][$i],
                    'last_btn_text' => $request['last_btn_text'][$i],
                    'last_btn_link' => $request['last_btn_link'][$i],
                    'slug' => Str::slug($request['title'][$i]),
            ]);
        }

        return redirect()->route('sliders.index')->with([
            'success' => 'Success',
            'text' => 'Slider updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if (!auth()->user()->can('sliders delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with([
            'success' => 'Success',
            'text' => 'Slider successfully deleted.',
        ]);
    }

    public function status_change(){
        


        Slider::where('id',request()->slider_id)->update([
            'status' => request()->status,
        ]);

        return true;
    }
}
