<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\BlogCategory;
use App\Models\BlogTags;
use App\Models\Category;
use App\Models\BlogTagsPivot;
use Illuminate\Http\Request;
use Str;
use Auth;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('services index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $rows = Service::orderby('id','desc')->get();
        return view('back.services.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        if (!auth()->user()->can('services create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.services.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('services create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('services', $imageName, 'public');
        }else{
            $imageName = '';
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }
        $service_id = Service::create([
            'img' => $imageName,
            'status' => $status,
        ])->id;

        if ($service_id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                ServiceTranslation::create([
                    'service_id' => $service_id,
                    'title' => $request['name'][$i],
                    'short_text' => $request['short_text'][$i],
                    'text' => $request['text'][$i],
                    'page_title' => $request['page_title'][$i],
                    'page_description' => $request['page_description'][$i],
                    'page_keywords' => $request['page_keywords'][$i],
                    'slug' => Str::slug($request['name'][$i]),
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        

        return redirect()->route('services.index')->with([
            'success' => 'Success',
            'text' => 'Service created',
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
    public function edit(Service $service)
    {
        if (!auth()->user()->can('services edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        
        
       
        return view('back.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        if (!auth()->user()->can('services edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('services', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }

        if (filled($request->status)) {
            $status = '1';
        } else {
            $status = '0';
        }

        Service::where('id', $service->id)->update([
            'img' => $imageName,
            'status' => $status,
        ]);

        for ($i = 0; $i < count($request->locale); $i++) {
            ServiceTranslation::where('service_id', $service->id)->where('locale', $request->locale[$i])->update([
                    'title' => $request['name'][$i],
                    'short_text' => $request['short_text'][$i],
                    'text' => $request['text'][$i],
                    'page_title' => $request['page_title'][$i],
                    'page_description' => $request['page_description'][$i],
                    'page_keywords' => $request['page_keywords'][$i],
                    'slug' => Str::slug($request['name'][$i]),
            ]);
        }

        
        return redirect()->route('services.index')->with([
            'success' => 'Success',
            'text' => 'Service updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if (!auth()->user()->can('services delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $service->delete();

        return redirect()->route('services.index')->with([
            'success' => 'Success',
            'text' => 'Service successfully deleted.',
        ]);
    }

    
}
