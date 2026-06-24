<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\OneClickOrder;
use Illuminate\Http\Request;
use Str;
use Auth;

class OneClickController extends Controller
{
    public function index(){
        $rows = OneClickOrder::orderby('id','desc');

        
        $rows = $rows->get();

        return view('back.oneclick.index',compact('rows'));
    }

    public function show($id){


        $order = OneClickOrder::where('id',$id)->first();

        

        return view('back.oneclick.show',compact('order'));
    }

    public function update(Request $request,$id){

        OneClickOrder::where('id',$id)->update([
            'status' => $request->status,
        ]);
        return redirect()->route('oneClickOrders.index');
    }
    
    public function destroy($id)
    {
        
        OneClickOrder::where('id',$id)->delete();
       

        return redirect()->route('oneClickOrders.index')->with([
            'success' => 'Success',
            'text' => 'Order successfully deleted.',
        ]);
    }
}
