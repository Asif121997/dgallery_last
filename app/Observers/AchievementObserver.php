<?php

namespace App\Observers;

use App\Models\Achievement;
use Illuminate\Support\Facades\Artisan;

class AchievementObserver
{
    /**
     * Handle the Achievement "created" event.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return void
     */
    public function created(Achievement $achievement)
    {
         Artisan::call('generate:sitemap');
    }

    /**
     * Handle the Achievement "updated" event.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return void
     */
    public function updated(Achievement $achievement)
    {
         Artisan::call('generate:sitemap');
    }
    
    public function deleted(Achievement $achievement)
    {
        Artisan::call('generate:sitemap');
    }

    

    
}
