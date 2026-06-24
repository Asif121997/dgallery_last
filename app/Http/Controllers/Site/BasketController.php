<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\OptionGroup;
use App\Models\Basket;
use App\Models\Settings;
use Auth;

class BasketController extends Controller
{
    public function index(){

        


        
        $user_id = Session('uniq_id');
        

        
        $meta['title'] = 'Səbət';
        
        $lang = [
            'az' => 'basket',
            'ru' => 'ru/basket',
        ];

        $products = Basket::where('user_id',$user_id)->get();
        return view('site.basket',compact('products','meta','lang'));
    }

    public function create(Request $request){
        
        

       
            $user_id = Session('uniq_id');
            $checkBasket = Basket::where('user_id',$user_id)->where('product_id',$request->product_id)->first();
        



        if(!isset($checkBasket->id)){
            Basket::insert([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'user_id' => $user_id,
                'count' => $request->quantity,
            ]);
        
        }else{
            $count = $checkBasket->count + $request->count;
            $checkBasket->update([
                'count' => $count,
            ]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Məhsul səbətə əlavə olundu!',
        ]);

    }

    public function count()
    {
        if (Auth::guard('customer')->check()) {
            $user_id = Auth::guard('customer')->id();
        } else {
            $user_id = session('uniq_id');
        }

        $count = Basket::where('user_id', $user_id)->count();

        return response()->json([
            'count' => $count
        ]);
    }


    public function total_price(){
        $total = 0;
        
        $globalSettings = Settings::first();


        if (Auth::guard('customer')->check()) {
            $user_id = Auth::guard('customer')->user()->id;

        }else{
            $user_id = Session('uniq_id');
        }

        $products = Basket::where('user_id',$user_id)->get();

        foreach($products as $product){
            if(!Auth::guard('customer')->check() or Auth::guard('customer')->user()->type == '0'){
                
                if($globalSettings->discount_check == 1){
                    $total += $product->product->wholesale_price * $product->count;
                }else{
                    if($product->product->discount_price != '0.00'){
                        $total += $product->product->discount_price * $product->count;
                    }else{
                        $total += $product->product->price * $product->count;
                    }
                }
                
            }else if(Auth::guard('customer')->user()->type == '1'){
                $total += $product->product->wholesale_price * $product->count;
            }else if(Auth::guard('customer')->user()->type == '2'){
                $total += $product->product->diller_price * $product->count;
            }else if(Auth::guard('customer')->user()->type == '3'){
                $total += $product->product->special_price * $product->count;
            }
            
        }
            
        return response()->json([
            'total_price' => $total
        ]);
    }

    public function remove(Request $request){
        Basket::where('id',$request->pr_id)->delete();

        return 'success';
    }

    public function countChange(Request $request){
        
        $globalSettings = Settings::first();
        $checkBasket = Basket::where('id',$request->pr_id)->first();


        $checkBasket->update([
            'count' => $request->count,
        ]);



        if(!Auth::guard('customer')->check() or Auth::guard('customer')->user()->type == '0'){
            
            if($globalSettings->discount_check == 1){
                    $totalPrice = $checkBasket->product->wholesale_price * $checkBasket->count;
                }else{
                    if($checkBasket->product->discount_price != '0.00'){
                        $totalPrice = $checkBasket->product->discount_price * $checkBasket->count;
                    }else{
                        $totalPrice = $checkBasket->product->price * $checkBasket->count;
                    }
                }
            
        }else if(Auth::guard('customer')->user()->type == '1'){
            $totalPrice = $checkBasket->product->wholesale_price * $checkBasket->count;
        }else if(Auth::guard('customer')->user()->type == '2'){
            $totalPrice = $checkBasket->product->diller_price * $checkBasket->count;
        }else if(Auth::guard('customer')->user()->type == '3'){
            $totalPrice = $checkBasket->product->special_price * $checkBasket->count;
        }


        
        return response()->json([
            'total_price' => $totalPrice
        ]);
    }
    
    public function updateMiniBasketCart() {
        $globalTotalBasketPrice = 0; // əvvəlcə sıfırla
        $html = '';
    
        if (Auth::guard('customer')->check()) {
            $globalBasket = Basket::where('user_id', Auth::guard('customer')->id())->get();
        } else {
            $globalBasket = Basket::where('user_id', Session('uniq_id'))->get();
        }
    
        foreach ($globalBasket as $globalBasketAllPrice) {
            $img = asset('storage/products/'.$globalBasketAllPrice->product->img);
            $translation = $globalBasketAllPrice->product->productTranslations->where('locale','az')->first();
            $url = route('product_inner_az',['slug' => $translation->slug]);
            $name = $translation->name;
    
            // məhsul qiyməti
            if(!Auth::guard('customer')->check() or Auth::guard('customer')->user()->type == '0'){
                if($globalBasketAllPrice->product->discount_price != '0.00'){
                    $globalPrice = $globalBasketAllPrice->product->discount_price;
                } else {
                    $globalPrice = $globalBasketAllPrice->product->price;
                }
            } elseif(Auth::guard('customer')->user()->type == '1'){
                $globalPrice = $globalBasketAllPrice->product->wholesale_price;
            } elseif(Auth::guard('customer')->user()->type == '2'){
                $globalPrice = $globalBasketAllPrice->product->diller_price;
            } elseif(Auth::guard('customer')->user()->type == '3'){
                $globalPrice = $globalBasketAllPrice->product->special_price;
            } elseif(Auth::guard('customer')->user()->type == '4'){
                $globalPrice = $globalBasketAllPrice->product->diller_price;
            }
    
            $globalTotalBasketPrice += $globalPrice * $globalBasketAllPrice->count;
    
            // HTML
            $html .= '<div class="mc-sin-pro fix">';
            $html .= '<a  href="'.$url.'" class="mc-pro-image float-left"><img width="49" src="'.$img.'" alt="" /></a>';
            $html .= '<div class="mc-pro-details fix">';
            $html .= '<a style="font-size:12px;" href="#">'.\Illuminate\Support\Str::limit($name, 30).'</a>';
            $html .= '<span>'.$globalBasketAllPrice->count.' x ₼'.$globalPrice.'</span>';
            $html .= '<a class="pro-del" data-id="'.$globalBasketAllPrice->id.'" href="#"><i class="fa fa-times-circle"></i></a>';
            $html .= '</div></div>';
        }
    
        return response()->json([
            'html' => $html,
            'total' => $globalTotalBasketPrice,
            'count' => $globalBasket->sum('count')
        ]);
    }

}
