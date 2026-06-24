<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OptionGroup;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionGroupsCategories;
use App\Models\OptionGroupTranslation;
use App\Http\Requests\Dashboard\FormOptionGroupRequest;
use App\Http\Requests\StoreOptionGroupRequest;
use App\Http\Requests\UpdateOptionGroupRequest;
use Illuminate\Http\Request;
use Str;

class OptionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('option_groups index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = OptionGroup::orderByDesc('order')->get();


        
        return view('back.option_groups.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('option_groups create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
        $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();
        return view('back.option_groups.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('option_groups create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
        if ($request['icon']) {
            $img = time() . '.' . $request->icon->extension();
            $request->icon->storeAs('public/options', $img);
        } else {
            $img = null;
        };

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }
        
        $option_group = OptionGroup::create([
            'status' => $status,
            'icon' => $img,
        ]);

        if ($option_group->id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                OptionGroupTranslation::create([
                    'option_group_id' => $option_group->id,
                    'name' => $request['name'][$i],
                    'slug' => Str::slug($request['name'][$i]),
                    'locale' => $request['locale'][$i]
                ]);
            };
        }


        if (filled($request->category_id)) {
            $option_group->categories()->sync($request->category_id);
        }

        return redirect()->route('option_groups.index')->with([
            'success' => 'Success',
            'text' => 'Option Group created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OptionGroup $optionGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OptionGroup $optionGroup)
    {
        if (!auth()->user()->can('option_groups edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();


        $OptionGroupCategoryIds = OptionGroupsCategories::where('option_group_id',$optionGroup->id)->pluck('category_id')->toArray();

        return view('back.option_groups.edit',compact('optionGroup','categories','OptionGroupCategoryIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OptionGroup $optionGroup)
    {
        if (!auth()->user()->can('option_groups edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
        if ($request['icon']) {
            $img = time() . '.' . $request->icon->extension();
            $request->icon->storeAs('public/options', $img);
        } else {
            $img = $request->old_icon;
        };
        
        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        };
        
        $optionGroup->update([
            'icon' => $img,
            'status' => $status,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            OptionGroupTranslation::where(['option_group_id'=> $optionGroup->id,'locale'=> $request->locale[$i]])->update([
                'name' => $request['name'][$i],
                'slug' => Str::slug($request['name'][$i]),
            ]);
        }

        if (filled($request->category_id)) {
            $optionGroup->categories()->sync($request->category_id);
        }

        return redirect()->route('option_groups.index')->with([
            'success' => 'Success',
            'text' => 'Option Group updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OptionGroup $optionGroup)
    {
        if (!auth()->user()->can('option_groups delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        OptionGroupTranslation::where('option_group_id',$optionGroup->id)->update([
            'slug'=>NULL,
        ]);
        
        Option::where('option_group_id',$optionGroup->id)->delete();
        $optionGroup->delete();

        return redirect()->route('option_groups.index')->with([
            'success' => 'Success',
            'text' => 'Option Group successfully deleted.',
        ]);
    }
    
    
    public function updateOrder(){
        // Retrieve the new row order from the request
        $newOrder = request()->input('order');
        // Update your database or data source with the new row order
        foreach ($newOrder as $index => $itemId) {
            // Calculate the correct order value based on the page and number of items per page
            $correctOrder = $index + (request()->input('start', 0) / request()->input('length', 10));

            OptionGroup::where('id', $itemId)->update(['order' => $index]);
        }
        return response()->json(['success' => true]);
    }
    
    
    public function options(){
        $optionGroup = request()->option_group;
        
        $rows = Option::where('option_group_id',$optionGroup)->orderby('id','desc')->get();
        
        return view('back.options.index',compact('rows'));
    }
}
