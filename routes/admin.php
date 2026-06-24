<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\SizeController;

use App\Http\Controllers\Dashboard\OptionGroupController;
use App\Http\Controllers\Dashboard\OptionController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\OneClickController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\RedirectController;
use App\Http\Controllers\Dashboard\BlogTagsController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\BlogCategoryController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [SliderController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('stores', StoreController::class);
    Route::resource('colors', ColorController::class);

    Route::resource('sizes', SizeController::class);

    Route::resource('oneClickOrders', OneClickController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('/new-edit/{customer}', [CustomerController::class, 'new'])->name('customers.new');
    Route::resource('redirects', RedirectController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/child-category/{category}', [CategoryController::class, 'childCategory'])->name('categories.childCategory');
    
    Route::get('/category-options/{category}', [CategoryController::class, 'optionGroups'])->name('categories.optionGroups');
    Route::resource('option_groups', OptionGroupController::class);
    Route::get('option_groups-update-order', [OptionGroupController::class,'updateOrder'])->name('datatable.updateOrderOptionGroups');
    
    Route::get('/option-groups-options/{option_group}', [OptionGroupController::class, 'options'])->name('option_groups.options');
    
    Route::resource('options', OptionController::class);
    
    
    
    Route::get('options-update-order', [OptionController::class,'updateOrder'])->name('datatable.updateOrderOptions');
    Route::resource('products', ProductController::class);
    Route::post('product-status-change', [ProductController::class, 'status_change'])->name('products.statusChange');
    Route::post('product-stock-change', [ProductController::class, 'stock_change'])->name('products.stockChange');
    Route::resource('sliders', SliderController::class);
    Route::post('slider-status-change', [SliderController::class, 'status_change'])->name('sliders.statusChange');

    Route::resource('blogs', BlogController::class);
    Route::post('blog-status-change', [BlogController::class, 'status_change'])->name('blogs.statusChange');
    
        Route::resource('blogCategory', BlogCategoryController::class);
        Route::resource('blogTags', BlogTagsController::class);

    Route::resource('brands', BrandController::class);
    Route::post('brand-status-change', [BrandController::class, 'status_change'])->name('brands.statusChange');

    Route::resource('banners', BannerController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('pages', PageController::class);
    Route::resource('settings', SettingsController::class);

    Route::get('categories-update-order', [CategoryController::class,'updateOrder'])->name('datatable.updateOrder');
});

Auth::routes();






