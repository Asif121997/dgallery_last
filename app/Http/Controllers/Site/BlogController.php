<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Category;
use App\Models\BlogTagsPivot;
use App\Models\BlogTags;
class BlogController extends Controller
{
    public function index(){


        $blogs = Blog::active();
        if(isset(request()->search)){
            
            $search = request()->search;

            $blogs = $blogs->whereHas('blogTranslations', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        if(request()->category){
            $category = BlogCategory::where('name',request()->category)->first();
            $blogs = $blogs->where('category_id',$category->id);

        }

        if(request()->tag){
            $tag = BlogTags::where('name',request()->tag)->first();

            $blogIds = BlogTagsPivot::where('tag_id',$tag->id)->pluck('blog_id');
 
            $blogs = $blogs->whereIn('id',$blogIds);
        }

        $blogs = $blogs->orderBy('created_at','desc')->paginate(16);

        $categories = BlogCategory::get();
        $tags = BlogTags::get();
        $lang = [
            'az' => '/bloqlar/',
            'en' => '/en/blogs/',
            'ru' => '/ru/bloqi/',
        ];
        $meta['title'] = 'Xəbərlər';
        return view('site.blogs.list',compact('blogs','lang','tags','categories','meta'));
    }

    public function inner($slug){

        $blog = Blog::whereHas('blogTranslations', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->active()->firstOrFail();

        $show = $blog->show + 1;

        $blog->update([
            'show' => $show,
        ]);


        $lastBlogs = Blog::active()->where('id','!=',$blog->id)->orderBy('created_at','desc')->limit(5)->get();
        
        $productCategory = Category::where('id',$blog->product_category_id)->first();
        
        
        if($productCategory){
            $prIds = ProductCategory::where('category_id',$productCategory->id)->pluck('product_id');
            
            $products = Product::active()->whereIn('id',$prIds)->inRandomOrder()->limit(8)->get();
            
           
        }else{
            $products = [];
        }
         

        $categories = BlogCategory::get();
        
        $tagsID = BlogTagsPivot::where('blog_id',$blog->id)->pluck('tag_id');
        $tags = BlogTags::whereIn('id',$tagsID)->get();
        $lang = [
            'az' => '/bloqlar/'.$blog->blogTranslations->where('locale','az')->first()->slug,
            'en' => '/en/blogs/'.$blog->blogTranslations->where('locale','en')->first()->slug,
            'ru' => '/ru/bloqi/'.$blog->blogTranslations->where('locale','ru')->first()->slug,
        ];
        
        $meta['title'] = $blog->blogTranslations->where('locale','az')->first()->title;
        $meta['description'] = $blog->blogTranslations->where('locale','az')->first()->description;

        return view('site.blogs.inner',compact('lang','blog','lastBlogs','categories','tags','products','meta'));
    }
}
