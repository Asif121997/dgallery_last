<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\OptionTranslation;
use App\Models\OptionGroup;
use App\Http\Requests\Dashboard\FormOptionRequest;
use Illuminate\Http\Request;
use Str;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('options index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Option::orderby('id','desc')->get();

        return view('back.options.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('options create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $optionGroups = OptionGroup::active()->get();

        return view('back.options.add',compact('optionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('options create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }


        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }
        
        $option = Option::create([
            'status' => $status,
            'option_group_id' => $request->option_group_id,
        ]);

        if ($option->id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                OptionTranslation::create([
                    'option_id' => $option->id,
                    'name' => $request['name'][$i],
                    'slug' => Str::slug($request['name'][$i]),
                    'locale' => $request['locale'][$i]
                ]);
            };
        }

        return redirect()->route('options.index')->with([
            'success' => 'Success',
            'text' => 'Option created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        if (!auth()->user()->can('options edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $optionGroups = OptionGroup::active()->get();
        return view('back.options.edit',compact('option','optionGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Option $option)
    {
        if (!auth()->user()->can('options edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        };
        
        $option->update([
            'status' => $status,
            'option_group_id' => $request->option_group_id,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            OptionTranslation::where(['option_id'=> $option->id,'locale'=> $request->locale[$i]])->update([
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
                
            ]);
        }

        return redirect()->route('options.index')->with([
            'success' => 'Success',
            'text' => 'Option updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        if (!auth()->user()->can('options delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        OptionTranslation::where('option_id',$option->id)->update([
            'slug'=>NULL,
        ]);
        $option->delete();

        return redirect()->route('options.index')->with([
            'success' => 'Success',
            'text' => 'Option successfully deleted.',
        ]);
    }
    
    public function updateOrder(){
        // Retrieve the new row order from the request
        $newOrder = request()->input('order');
        // Update your database or data source with the new row order
        foreach ($newOrder as $index => $itemId) {
            // Calculate the correct order value based on the page and number of items per page
            $correctOrder = $index + (request()->input('start', 0) / request()->input('length', 10));

            Option::where('id', $itemId)->update(['order' => $index]);
        }
        return response()->json(['success' => true]);
    }
}
