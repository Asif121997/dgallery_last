<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Str;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('store index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Store::orderby('id','desc')->get();

        return view('back.store.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('store create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.store.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('store create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        

        Store::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('stores.index')->with([
            'success' => 'Success',
            'text' => 'Store created',
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
    public function edit(Store $store)
    {
        if (!auth()->user()->can('store edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }


        return view('back.store.edit',compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        if (!auth()->user()->can('store edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        

        Store::where('id', $store->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        

        return redirect()->route('stores.index')->with([
            'success' => 'Success',
            'text' => 'Store updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        if (!auth()->user()->can('store delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $store->delete();

        return redirect()->route('stores.index')->with([
            'success' => 'Success',
            'text' => 'Store successfully deleted.',
        ]);
    }

    
}
