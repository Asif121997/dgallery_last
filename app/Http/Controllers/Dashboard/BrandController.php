<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('brands index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Brand::orderby('id','desc')->get();

        return view('back.brands.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('brands create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.brands.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('brands create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('brands', $imageName, 'public');
        }else{
            $imageName = '';
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        Brand::create([
            'img' => $imageName,
            'status' => $status,
            'name' => $request->name,
            'link' => $request->link,
        ]);

        return redirect()->route('brands.index')->with([
            'success' => 'Success',
            'text' => 'Brand created',
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
    public function edit(Brand $brand)
    {
        if (!auth()->user()->can('brands edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }


        return view('back.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        if (!auth()->user()->can('brands edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('brands', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        Brand::where('id', $brand->id)->update([
            'img' => $imageName,
            'status' => $status,
            'name' => $request->name,
            'link' => $request->link,
        ]);

        

        return redirect()->route('brands.index')->with([
            'success' => 'Success',
            'text' => 'Brand updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if (!auth()->user()->can('brands delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $brand->delete();

        return redirect()->route('brands.index')->with([
            'success' => 'Success',
            'text' => 'Brand successfully deleted.',
        ]);
    }

    public function status_change(){
        
        Brand::where('id',request()->brand_id)->update([
            'status' => request()->status,
        ]);

        return true;
    }
}
