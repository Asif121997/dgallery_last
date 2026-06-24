<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function index(){


        $brands = Brand::active()->get();
        
        $lang = [
            'az' => '/brands/',
            'en' => '/en/blogs/',
            'ru' => '/ru/brands/',
        ];
        $meta['title'] = 'Xəbərlər';
        return view('site.brands.list',compact('brands','lang'));
    }

    
}
