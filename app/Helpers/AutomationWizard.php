<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class AutomationWizard
{
    public static function purgeCache()
    {
//        Http::get(env('WEBSITE_URL').'purge-cache');
        \Artisan::call('optimize:clear');
        \Log::info('Cache purged');
        return redirect()->back();
    }
}
