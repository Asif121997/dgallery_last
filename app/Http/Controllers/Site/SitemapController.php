<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use DB;
use View;
use Response;
class SitemapController extends Controller
{
    public function index(){
        $services = Service::active()->get();
        $blogs = Blog::active()->get();
        $categories = Category::active()->get();
        $products = Product::active()->get();
        $content = View::make('site.sitemap',['services' => $services,'blogs' => $blogs,'categories' => $categories,'products' => $products]);
        return Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
    }
}
