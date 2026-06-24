<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Str;
use Auth;

class OrderController extends Controller
{
    public function index(){
        $rows = Order::orderby('id','desc');

        if(request()->name){
            $rows = $rows->where('name', 'like', '%' . request()->name . '%');
        }

        if(request()->lastname){
            $rows = $rows->where('lastname', 'like', '%' . request()->lastname . '%');
        }

        if(request()->phone){
            $rows = $rows->where('phone', 'like', '%' . request()->phone . '%');
        }

        if(request()->email){
            $rows = $rows->where('email', 'like', '%' . request()->email . '%');
        }

        if(request()->city){
            $rows = $rows->where('city', request()->city);
        }

        if(request()->view){
            if(request()->view != 100){

                if(request()->view == 2){
                    $rows = $rows->where('view', '0');
                }else{
                    $rows = $rows->where('view', request()->view);
                }
            }
        }

        if(request()->status){
            if(request()->status != 100){
                if(request()->status == 1001){
                    $rows = $rows->where('status', '0');
                }else{
                    $rows = $rows->where('status', request()->status);
                }
            }
        }

        if(request()->date){
            $rows = $rows->where('created_at', 'like', '%' . request()->date . '%');
        }

        $rows = $rows->get();

        return view('back.orders.index',compact('rows'));
    }

    public function show($id){


        $order = Order::where('id',$id)->first();

        $order->update([
            'view' => '1',
        ]);

        return view('back.orders.show',compact('order'));
    }

    public function update(Request $request,$id){

        Order::where('id',$id)->update([
            'status' => $request->status,
        ]);
        return redirect()->route('orders.index');
    }
    
    public function destroy(Order $order)
    {
        

        $order->delete();

        return redirect()->route('orders.index')->with([
            'success' => 'Success',
            'text' => 'Order successfully deleted.',
        ]);
    }
}
