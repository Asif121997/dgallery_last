<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Facades\Artisan;

class BlogObserver
{
    /**
     * Handle the Blog "created" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function created(Blog $blog)
    {
         Artisan::call('generate:sitemap');
    }

    /**
     * Handle the Blog "updated" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function updated(Blog $blog)
    {
         Artisan::call('generate:sitemap');
    }
    
    public function deleted(Blog $blog)
    {
        Artisan::call('generate:sitemap');
    }

    
}
