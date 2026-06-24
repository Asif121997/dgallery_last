<?php

namespace App\Observers;

use App\Models\SeoPage;
use Illuminate\Support\Facades\Artisan;
class SeoPageObserver
{
    /**
     * Handle the SeoPage "created" event.
     *
     * @param  \App\Models\SeoPage  $seoPage
     * @return void
     */
    public function created(SeoPage $seoPage)
    {
         Artisan::call('generate:sitemap');
    }

    /**
     * Handle the SeoPage "updated" event.
     *
     * @param  \App\Models\SeoPage  $seoPage
     * @return void
     */
    public function updated(SeoPage $seoPage)
    {
         Artisan::call('generate:sitemap');
    }
    
    public function deleted(SeoPage $seoPage)
    {
        Artisan::call('generate:sitemap');
    }

    
}
