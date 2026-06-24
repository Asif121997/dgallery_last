<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewTranslation;
use Illuminate\Http\Request;
use Str;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->can('reviews index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Review::orderby('id','desc')->get();

        return view('back.reviews.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('reviews create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('back.reviews.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->user()->can('reviews create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('reviews', $imageName, 'public');
        }else{
            $imageName = '';
        }
        

        $review_id = Review::create([
            'img' => $imageName,
        ])->id;

        if ($review_id) {
            for ($i = 0; $i < count($request->locale); $i++) {
                ReviewTranslation::create([
                    'review_id' => $review_id,
                    'name' => $request['name'][$i],
                    'text' => $request['text'][$i],
                    'locale' => $request['locale'][$i],
                ]);
            }
        }

        return redirect()->route('reviews.index')->with([
            'success' => 'Success',
            'text' => 'Reviews created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    
    public function destroy(Review $review)
    {
        if (!auth()->user()->can('reviews delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $review->delete();

        return redirect()->route('reviews.index')->with([
            'success' => 'Success',
            'text' => 'Review successfully deleted.',
        ]);
    }
}
