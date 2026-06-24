<?php

namespace App\Providers;

use App\Events\PageVisited;
use App\Listeners\StoreLog;
use App\Events\SearchLogging;
use App\Listeners\IncreaseViews;
use App\Events\PostStatusUpdated;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SyncPostStatusWithAlgolia;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        PostStatusUpdated::class => [
            SyncPostStatusWithAlgolia::class,
        ],
        PageVisited::class => [
            IncreaseViews::class,
        ],
        SearchLogging::class => [
            StoreLog::class,
        ],
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\MergeBasketOnLogin::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
