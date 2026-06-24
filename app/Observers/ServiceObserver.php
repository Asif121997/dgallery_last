<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Artisan;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function created(Service $service)
    {
        
        Artisan::call('generate:sitemap');
    }

    /**
     * Handle the Service "updated" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function updated(Service $service)
    {
         Artisan::call('generate:sitemap');
    }
    
    public function deleted(Service $service)
    {
        Artisan::call('generate:sitemap');
    }

   
}
