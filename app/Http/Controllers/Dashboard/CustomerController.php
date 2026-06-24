<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use DB;

class CustomerController extends Controller
{
    public function index(){

        if (!auth()->user()->can('customers index')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $rows = Customer::orderby('id','desc')->get();

        return view('back.customers.index',compact('rows'));
    }

    public function create(){

        if (!auth()->user()->can('customers create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        return view('back.customers.add');
    }

    public function store(Request $request){
        if (!auth()->user()->can('customers create')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }


        
        if($request->password  == $request->password_confirmation){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
            ]);

            $customer = Customer::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'type' => $request->type,
                'password' => bcrypt($request->password),
            ]);

            

            return redirect()->route('customers.index')->with([
                'success' => 'Success',
                'text' => 'Customer created',
            ]);
        }else{
            return redirect()->back()->with([
                'error' => 'Error',
                'text' => 'Password and Password Repeat are not the same',
            ])->withInput();
        }
    }

    public function edit(Customer $customer){

        if (!auth()->user()->can('customers edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
       
        $customer->update([
            'new' => '1',   
        ]);
       
        return view('back.customers.edit',compact('customer'));

    }

    public function update(Customer $customer,Request $request){
        if (!auth()->user()->can('customers edit')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
        $customer->name = $request->name;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->type = $request->type;
        if(!empty($request->password)){
            if($request->password and $request->password == $request->password_confirmation){
                $customer->password = bcrypt($request['password']);
            }
        }
        

        $customer->save();
        

        return redirect()->route('customers.index')->with([
            'success' => 'Success',
            'text' => 'Customer updated',
        ]);

    }


    public function destroy(Customer $customer)
    {
        if (!auth()->user()->can('customers delete')) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $customer->delete();
        return redirect()->route('customers.index')->with([
            'success' => 'Success',
            'text' => 'Customer successfully deleted.',
        ]);
    }
    
    public function new($id){
        Customer::where('id',$id)->update([
            'new'=>'1',    
        ]);
        
        return redirect()->back();
    }
}
