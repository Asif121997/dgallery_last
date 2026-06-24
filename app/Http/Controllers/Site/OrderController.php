<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Settings;
use Auth;
use Validator;
use Str;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function checkout(){


        
        $user_id = Session('uniq_id');
        


        $globalSettings = Settings::first();
        $products = Basket::where('user_id',$user_id)->get();

        if(!count($products)){
            return redirect()->route('homepage');
        }
        $meta['title'] ='Sifariş';
        
        $lang = [
            'az' => '/checkout',
            'ru' => '/ru/checkout',
        ];
        return view('site.order.checkout',compact('products','meta','lang'));
    }

    public function order(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => [
                'required',
                'regex:/^\+994\(\d{2}\)\d{3}-\d{2}-\d{2}$/'
            ],
        ], [
            'phone.regex' => 'Telefon nömrəsi düzgün formatda olmalıdır: +994 (XX) XXX-XX-XX',
        ]);
        if ($validator->fails()) {
            return \Redirect::back()
                ->with('errormessage', 'Zəhmət olmasa bütün xanaları doldurun.');
        }
        $globalSettings = Settings::first();
        if (Auth::guard('customer')->check()) {
            $user_id = Auth::guard('customer')->user()->id;


            $products = Basket::where('user_id',$user_id)->get();
            $json = [];
            foreach($products as $k=>$product){

                if(Auth::guard('customer')->user()->type == '0'){
                    if($globalSettings->discount_check == 1){
                        $price = $product->product->wholesale_price;
                        $discount = 'Endirimlə';
                    }else{
                        if($product->product->discount_price != '0.00'){
                            $price = $product->product->discount_price;
                            $discount = 'Endirimlə';
                        }else{
                            $price = $product->product->price;
                            $discount = 'Endirimsiz';
                        }
                    }
                    
                }else if(Auth::guard('customer')->user()->type == '1'){
                    $price = $product->product->wholesale_price;
                    $discount = 'Topdan';
                }else if(Auth::guard('customer')->user()->type == '2'){
                    $price = $product->product->diller_price;
                    $discount = 'Diller';
                }else if(Auth::guard('customer')->user()->type == '3'){
                    $price = $product->product->special_price;
                    $discount = 'Xüsusi';
                }

                


                $json[$k] = [
                    'product_img' => $product->product->img,
                    'product_name' => $product->product->productTranslations->where('locale','az')->first()->name,
                    'product_slug' => $product->product->productTranslations->where('locale','az')->first()->slug,
                    'product_price' => $price,
                    'discount' => $discount,
                    'product_count' => $product->count,
                    'product_color' => $product->color->colorTranslations->where('locale','az')->first()->name,
                    'product_color_code' => $product->color->color_code,
                ];

                $product->delete();
            }
                
            Order::create([
                'user_id' => $user_id,
                'name' => Auth::guard('customer')->user()->name,
                'lastname' => $request->lastname,
                'email' => Auth::guard('customer')->user()->email,
                'phone' => Auth::guard('customer')->user()->phone,
                'address' => $request->address,
                'city' => $request->city,
                'note' => $request->note,
                'orders' => json_encode($json),
            ]);

            
            return redirect()->route('homepage')
            ->with('status', 'success')
            ->with('message', 'Sifarişiniz uğurla təsdiqləndi.');
        }else{
            
            $checkCustomer = Customer::where('email',$request['email'])->first();
            $userPassword = Str::random(10);

            $user_id = Session('uniq_id');
            
            if(!isset($checkCustomer->id)){
                $UID = Customer::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'password' => Hash::make($userPassword),
                    'status' => 1,
                ]);
            }else{
                $UID = $checkCustomer;
            }
            

            


            $products = Basket::where('user_id',$user_id)->get();
            $json = [];
            foreach($products as $k=>$product){
                
                if($globalSettings->discount_check == 1){
                    $price = $product->product->wholesale_price;
                    $discount = 'Endirimlə';
                }else{
                    if($product->product->discount_price != '0.00'){
                        $price = $product->product->discount_price;
                        $discount = 'Endirimlə';
                    }else{
                        $price = $product->product->price;
                        $discount = 'Endirimsiz';
                    }
                }
                $json[$k] = [
                    'product_img' => $product->product->img,
                    'product_name' => $product->product->productTranslations->where('locale','az')->first()->name,
                    'product_slug' => $product->product->productTranslations->where('locale','az')->first()->slug,
                    'product_price' => $price,
                    'discount' => $discount,
                    'product_count' => $product->count,
                    'product_color' => $product->color->colorTranslations->where('locale','az')->first()->name,
                    'product_color_code' => $product->color->color_code,
                ];

                $product->delete();
            }

            
            Order::create([
                'user_id' => $UID->id,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'note' => $request->note,
                'orders' => json_encode($json),
            ]);
            Auth::guard('customer')->login($UID);
            Basket::where('user_id',$user_id)->delete();
            return redirect()->route('homepage')
            ->with('status', 'success')
            ->with('message', 'Sifarişiniz uğurla təsdiqləndi.');
        }

    }
}
