<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Redirect;
use Illuminate\Http\Request;
use Str;
use Auth;
class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('redirect index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $rows = Redirect::orderby('id','desc')->get();
        return view('back.redirect.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        if (!auth()->user()->can('redirect create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        return view('back.redirect.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('redirect create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        
        $blog_id = Redirect::create([
            'from' => $request->from,
            'to' => $request->to,
        ]);

        

        return redirect()->route('redirects.index')->with([
            'success' => 'Success',
            'text' => 'Redirect created',
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Redirect $redirect)
    {
        if (!auth()->user()->can('redirect delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $redirect->delete();

        return redirect()->route('redirects.index')->with([
            'success' => 'Success',
            'text' => 'Redirect successfully deleted.',
        ]);
    }

    
}
