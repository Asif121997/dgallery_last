<?php

namespace App\Providers;



use Illuminate\Support\Facades\Cache;
use View;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Basket;
use App\Models\Wishlist;
use App\Models\Blog;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OneClickOrder;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Artisan;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        if (!Session::has('currency')) {
            Session::put('currency', 'usd');
        }

        if (!Session::has('uniq_id')) {
            

                // login olmayıbsa 2 hərf + 4 rəqəm yarad
                $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
                $numbers = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
                $uniqId = $letters . $numbers;
                
                Session::put('uniq_id', $uniqId);
            

        }
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            if (Auth::guard('customer')->check()) {
                $basketCount = Basket::where('user_id',Auth::guard('customer')->id())->count();
                
                $globalBasket = Basket::where('user_id',Auth::guard('customer')->id())->get();
                
                
               $globalTotalBasketPrice = 0; 

			    foreach($globalBasket as $globalBasketAllPrice){
			        if(!Auth::guard('customer')->check() or Auth::guard('customer')->user()->type == '0'){
			            if($globalBasketAllPrice->product->discount_price != '0.00'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->discount_price * $globalBasketAllPrice->count;
			            }else{
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->price * $globalBasketAllPrice->count;
			            }
			            }elseif(Auth::guard('customer')->user()->type == '1'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->wholesale_price * $globalBasketAllPrice->count;
			            }elseif(Auth::guard('customer')->user()->type == '2'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->diller_price * $globalBasketAllPrice->count;
			            }elseif(Auth::guard('customer')->user()->type == '3'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->special_price * $globalBasketAllPrice->count;
			            }elseif(Auth::guard('customer')->user()->type == '4'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->diller_price * $globalBasketAllPrice->count;
			            }
			    }
								    
									


												
								



								

                $wishlistCount = Wishlist::where('user_id',Auth::guard('customer')->id())->count();

                $checkWishlist = Wishlist::where('user_id',Auth::guard('customer')->id())->pluck('product_id')->toArray();
            }else{
                $basketCount = Basket::where('user_id',Session('uniq_id'))->count();
                $globalBasket = Basket::where('user_id',Session('uniq_id'))->get();
                $globalTotalBasketPrice = 0; 

			    foreach($globalBasket as $globalBasketAllPrice){
			        if(!Auth::guard('customer')->check() or Auth::guard('customer')->user()->type == '0'){
			            if($globalBasketAllPrice->product->discount_price != '0.00'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->discount_price * $globalBasketAllPrice->count;
			            }else{
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->price * $globalBasketAllPrice->count;
			            }
			            }elseif(Auth::guard('customer')->user()->type == '1'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->wholesale_price * $globalBasketAllPrice->count;
			            }elseif(Auth::guard('customer')->user()->type == '2'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->diller_price * $globalBasketAllPrice->count;
			            }elseif(Auth::guard('customer')->user()->type == '3'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->special_price * $globalBasketAllPrice->count;
			            }elseif(Auth::guard('customer')->user()->type == '4'){
			                $globalTotalBasketPrice += $globalBasketAllPrice->product->diller_price * $globalBasketAllPrice->count;
			            }
			    }
                $wishlistCount = Wishlist::where('user_id',Session('uniq_id'))->count();
                $checkWishlist = Wishlist::where('user_id',Session('uniq_id'))->pluck('product_id')->toArray();
            }
            
            

                
                $footerlastBlogs = Blog::active()->orderBy('created_at','desc')->orderBy('id','desc')->limit(4)->get();
            $globalSettings = Settings::where('id', 1)->first();
            $globalServices = Service::active()->get();
            $noViewOrders = Order::orderby('id','desc')->where('view','0')->get();
            $noViewCustomers = Customer::orderby('id','desc')->where('new','0')->get();
            $oneClickOrders = OneClickOrder::orderby('id','desc')->where('status','0')->get();


            $globalCategories = Category::active()->whereNull('parent_id')
                ->with(['children' => function ($query) {
                    $query->active()->orderBy('order', 'asc');
                }])
                ->orderBy('order','asc')
                ->get();
            $view->with([
                

                'globalSettings' => $globalSettings,
                'globalBasket' => $globalBasket,
                'basketCount' => $basketCount,
                'globalTotalBasketPrice' => $globalTotalBasketPrice,
                'checkWishlist' => $checkWishlist,
                'wishlistCount' => $wishlistCount,
                'globalServices' => $globalServices,
                'footerlastBlogs' => $footerlastBlogs,
                'noViewOrders' => $noViewOrders,
                'noViewCustomers' => $noViewCustomers,
                'oneClickOrders' => $oneClickOrders,

                'globalCategories' => $globalCategories,

            ]);
        });
    }
}
