<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\FormColorRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Size;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Str;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('size index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Size::orderby('id','desc')->get();

        return view('back.size.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('size create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();
        return view('back.size.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('size create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $color_id = Size::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ])->id;

        

        return redirect()->route('sizes.index')->with([
            'success' => 'Success',
            'text' => 'Size created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        if (!auth()->user()->can('size edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();

        return view('back.size.edit',compact('size','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        if (!auth()->user()->can('size edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        Size::where('id', $size->id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        

        return redirect()->route('sizes.index')->with([
            'success' => 'Success',
            'text' => 'Size updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        if (!auth()->user()->can('size delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $size->delete();

        return redirect()->route('sizes.index')->with([
            'success' => 'Success',
            'text' => 'Size successfully deleted.',
        ]);
    }
}
