<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\IndexController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\BrandController;
use App\Http\Controllers\Site\CustomerController;
use App\Http\Controllers\Site\BasketController;
use App\Http\Controllers\Site\WishlistController;
use App\Http\Controllers\Site\ServiceController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function () {
    return app(\App\Http\Middleware\CustomRedirect::class)->handle(request(), function ($request) {
        abort(404);
    });
});

Route::namespace('App\Http\Controllers\Site')->middleware(['web'])->group(function () {
    $locale = Request::segment(1);

    $prefix = in_array($locale, ['en', 'ar']) ? $locale : null;


    Route::group([
        'prefix' => $prefix,
        'middleware' => ['setlocale']
    ], function () {
        Route::get('/', [IndexController::class, 'index'])->name('homepage');
        
        Route::get("sitemap.xml", array(
    	    "as"   => "sitemap",
    	    "uses" => "App\Http\Controllers\Site\SitemapController@index", // or any other controller you want to use
    	));

 
        

        /* Products Route */
        
        Route::get('mehsullar', [ProductController::class, 'list'])->name('product_az');

        Route::get('product_list', [ProductController::class, 'list'])->name('product_en');

        Route::get('produkty', [ProductController::class, 'list'])->name('product_ru');
        
        

        

        Route::get('product/{slug}', [ProductController::class, 'inner'])->name('product_inner');

        
        Route::get('brands', [BrandController::class, 'index'])->name('brands');
        
        
        Route::get('/mehsul-melumat/{id}', [ProductController::class, 'showAjax'])->name('product.showAjax');

        /* Blogs Route */

        Route::get('bloqlar', [BlogController::class, 'index'])->name('blogs_az');

        Route::get('blogss', [BlogController::class, 'index'])->name('blogs_en');

        Route::get('bloqi', [BlogController::class, 'index'])->name('blogs_ru');

        Route::get('bloqlar/{slug}', [BlogController::class, 'inner'])->name('blog_inner_az');

        Route::get('blogss/{slug}', [BlogController::class, 'inner'])->name('blog_inner_en');

        Route::get('bloqi/{slug}', [BlogController::class, 'inner'])->name('blog_inner_ru');
        
        /* Contact Route */

        Route::get('xidmetler', [ServiceController::class, 'index'])->name('services_az');
        
        
        Route::get('xidmet/{slug}', [ServiceController::class, 'inner'])->name('service_inner');
        
        

        /* Contact Route */

        Route::get('elaqe', [ContactController::class, 'index'])->name('contact_az');

        Route::get('contact', [ContactController::class, 'index'])->name('contact_en');

        Route::get('kontakt', [ContactController::class, 'index'])->name('contact_ru');
        
        Route::post('kontakt-form', [ContactController::class, 'form'])->name('contact_form');
        
        /* About Route */
        Route::get('haqqimizda', [PageController::class, 'about'])->name('about_az');

        Route::get('about', [PageController::class, 'about'])->name('about_en');

        Route::get('o-nas', [PageController::class, 'about'])->name('about_ru');


        Route::get('mehsul-qaytarilmasi', [PageController::class, 'product_return'])->name('product_return');
        Route::get('zemanetin-sertleri', [PageController::class, 'warranty_conditions'])->name('warranty_conditions');
        Route::get('mexfilik-siyaseti', [PageController::class, 'privacy_policy'])->name('privacy_policy');
        Route::get('satis-qaydalari', [PageController::class, 'sales_rules'])->name('sales_rules');
        Route::get('catdirilma', [PageController::class, 'delivery'])->name('delivery');


        Route::get('currency-change', [IndexController::class, 'currency_change'])->name('currency_change');
        
        Route::post('bir-klikle-al', [ProductController::class, 'oneclickpost'])->name('oneclickpost');
        Route::get('basket', [BasketController::class, 'index'])->name('basket');
        Route::get('basket-count', [BasketController::class, 'count'])->name('basket_count');
        Route::get('basket-total-price', [BasketController::class, 'total_price'])->name('basket_total_price');
        Route::post('basket-remove', [BasketController::class, 'remove'])->name('basket_remove');
        Route::post('basket-count-change', [BasketController::class, 'countChange'])->name('basket_count_change');
        Route::get('update-mini-basket-cart', [BasketController::class, 'updateMiniBasketCart'])->name('updateMiniBasketCart');

        Route::post('/basket-add', [BasketController::class, 'create'])->name('add_basket');


        Route::post('/wishlist-add', [WishlistController::class, 'create'])->name('add_wishlist');

        Route::get('wishlist-count', [WishlistController::class, 'count'])->name('wishlist_count');
        Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
        Route::post('wishlist-remove', [WishlistController::class, 'remove'])->name('wishlist_remove');
        Route::get('search', [SearchController::class, 'search'])->name('search');

            
        Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('order', [OrderController::class, 'order'])->name('order');

        Route::middleware(['customer.auth'])->group(function () {
            Route::get('melumatlarim', [CustomerController::class, 'information'])->name('information');

            Route::post('information-save', [CustomerController::class, 'informationPost'])->name('informationPost');
            Route::get('kabinet', [CustomerController::class, 'panel'])->name('panel');
            Route::get('sifreni-yenile', [CustomerController::class, 'passwordEdit'])->name('passwordEdit');
            Route::post('sifreni-yenile-post', [CustomerController::class, 'passwordUpdate'])->name('passwordUpdate');
            Route::get('cixis', [CustomerController::class, 'logout'])->name('customer_logout');
            
        });

        Route::middleware(['guest.customer'])->group(function () {

            Route::get('customer-sign-in', [CustomerController::class, 'signin'])->name('customer_signin');
            
            
            Route::post('customer-register', [CustomerController::class, 'register'])->name('customer_register');
            Route::post('customer-login', [CustomerController::class, 'login'])->name('customerLoginPost');
            Route::get('forgot-password', [CustomerController::class, 'forgotPassword'])->name('forgotPassword');
            Route::post('forgot-password-post', [CustomerController::class, 'forgotPasswordPost'])->name('forgotPasswordPost');
            Route::get('customer/password/reset/{token}', [CustomerController::class, 'passwordReset'])->name('passwordReset');
            Route::post('customer/password/reset/update', [CustomerController::class, 'passwordResetUpdate'])->name('passwordResetUpdate');

        });
        
        Route::get('/category/{any}', function ($any) {
    return Redirect::to('/' . $any, 301);
})->where('any', '.*');
        Route::prefix('category')->group(function () {
    // /category/telefon, /category/laptop və s.
    Route::get('{slug}', [CategoryController::class, 'index'])->name('category-products');
});
        Route::get('{slug}', [CategoryController::class, 'index'])->name('category-products');
        
        
        
       
        
        
        
    });
});
