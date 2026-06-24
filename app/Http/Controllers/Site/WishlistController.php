<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\OptionGroup;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function index(){

        if (Auth::guard('customer')->check()) {
            $user_id = Auth::guard('customer')->user()->id;

        }else{
            $user_id = Session('uniq_id');
        }
        $meta['title'] = 'Sevimlilər';
        
        $lang = [
            'az' => '/wishlist',
            'ru' => '/ru/wishlist',
        ];
        $products = Wishlist::where('user_id',$user_id)->get();
        return view('site.wishlist',compact('products','meta','lang'));
    }

    public function create(Request $request){
         if (Auth::guard('customer')->check()) {
            $user_id = Auth::guard('customer')->user()->id;
            $checkWishlist = Wishlist::where('user_id',$user_id)->where('product_id',$request->pr_id)->first();

        }else{
            $user_id = Session('uniq_id');
            $checkWishlist = Wishlist::where('user_id',$user_id)->where('product_id',$request->pr_id)->first();
        }


        if(!isset($checkWishlist->id)){
            Wishlist::insert([
                'product_id'=>$request->pr_id,
                'user_id' => $user_id,
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Məhsul sevimlilərə əlavə olundu!',
            ]);
        }else{
            $checkWishlist->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'Məhsul sevimlilərdən silindi!',
            ]);
        }

        
    }

    public function count()
    {
        if (Auth::guard('customer')->check()) {
            $user_id = Auth::guard('customer')->id();
        } else {
            $user_id = session('uniq_id');
        }

        $count = Wishlist::where('user_id', $user_id)->count();

        return response()->json([
            'count' => $count
        ]);
    }

    public function remove(Request $request){

        
        Wishlist::where('id',$request->pr_id)->delete();

        return 'success';
    }
}
