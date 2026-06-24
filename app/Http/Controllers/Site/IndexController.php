<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\ProductCategory;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Artisan;

class IndexController extends Controller
{
    public function index(){

        

        // Artisan::call('optimize:clear');
        
        $slider = Slider::active()->orderBy('id','desc')->first();


        $lang = [
            'az' => '/',
            'en' => '/en',
            'ru' => '/ru',
        ];


        $FirstBanners = Banner::rowOne()->get();
        $SecondBanners = Banner::rowTwo()->get();
        $ThirdBanners = Banner::rowThree()->get();

        
        return view('site.index',compact('slider','lang','FirstBanners','SecondBanners','ThirdBanners'));

    }

    public function currency_change(){
        if(request()->currency){
            $currency = ['azn','usd','eur'];
            if(in_array(request()->currency,$currency)){
                Session::put('currency', request()->currency);
            }else{
                Session::put('currency', 'azn');
            }
        }else{
            Session::put('currency', 'azn');
        }

        return back();
    }
}