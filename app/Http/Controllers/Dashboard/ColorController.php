<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\FormColorRequest;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ColorTranslation;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

use Illuminate\Http\Request;
use Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('colors index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Color::orderby('id','desc')->get();

        return view('back.colors.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('colors create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.colors.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('colors create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('materials', $imageName, 'public');
        }else{
            $imageName = '';
        }
        $color_id = Color::create([
            'color_code' => $request->color_code,
            'img' => $imageName,
        ])->id;

        if ($color_id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                ColorTranslation::create([
                    'color_id' => $color_id,
                    'name' => $request['name'][$i],
                    'slug' => Str::slug($request['name'][$i]),
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        return redirect()->route('colors.index')->with([
            'success' => 'Success',
            'text' => 'Color created',
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
    public function edit(Color $color)
    {
        if (!auth()->user()->can('colors edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }


        return view('back.colors.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        if (!auth()->user()->can('colors edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('materials', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }

        

        Color::where('id', $color->id)->update([
            'color_code' => $request->color_code,
            'img' => $imageName,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            ColorTranslation::where('color_id', $color->id)->where('locale', $request->locale[$i])->update([
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
            ]);
        }

        return redirect()->route('colors.index')->with([
            'success' => 'Success',
            'text' => 'Color updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        if (!auth()->user()->can('colors delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $color->delete();

        return redirect()->route('colors.index')->with([
            'success' => 'Success',
            'text' => 'Color successfully deleted.',
        ]);
    }
}
