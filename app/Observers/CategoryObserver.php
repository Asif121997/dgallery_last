<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Artisan;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        Artisan::call('generate:sitemap');
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
         Artisan::call('generate:sitemap');
    }
    
     public function deleted(Category $category)
    {
        Artisan::call('generate:sitemap');
    }

}
