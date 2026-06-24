<?php

namespace App\Listeners;

use App\Events\PageVisited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cookie;

class IncreaseViews
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PageVisited  $event
     * @return void
     */
    public function handle(PageVisited $event)
    {
        // Retrieve the existing cookie value (if any)
        $existingCookie = request()->cookie($event->indicator);
        $productArray = $existingCookie ? json_decode($existingCookie, true) : [];

        $productId = $event->page->id;
        $currentDate = time();

        if (isset($productArray[$productId])) {
            $clickDate = strtotime($productArray[$productId]);
            $interval = ($currentDate - $clickDate) / 60; // Interval in minutes

            if ($interval >= 21600) { // Change 21600 to the desired interval in minutes
                // Update the click date to the current date
                $productArray[$productId] = date('Y-m-d H:i:s', $currentDate);
                $event->page->increment('view');
            }
        } else {
            // Add the new product click information
            $productArray[$productId] = date('Y-m-d H:i:s', $currentDate);
            $event->page->increment('view');
        }

        // Store the updated array in the cookie
        $serializedValue = json_encode($productArray);
        Cookie::queue($event->indicator, $serializedValue, 21600); // Change 21600 to the desired interval in minutes
    }
}
