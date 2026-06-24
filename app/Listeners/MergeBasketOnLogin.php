<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Session;
use App\Models\Basket;

class MergeBasketOnLogin
{
    public function handle(Login $event): void
    {
        $user = $event->user;
        $guestUserId = Session::get('uniq_id');

        if ($guestUserId) {
            $guestBaskets = Basket::where('user_id', $guestUserId)->get();

            foreach ($guestBaskets as $guestBasket) {
                // userin səbətində həmin məhsul varmı?
                $userBasket = Basket::where('user_id', $user->id)
                                    ->where('product_id', $guestBasket->product_id)
                                    ->first();

                if ($userBasket) {
                    // varsa, miqdarları topla
                    $userBasket->count += $guestBasket->count;
                    $userBasket->save();

                    // guest versiyanı sil
                    $guestBasket->delete();
                } else {
                    // yoxdursa, sadəcə user_id-ni dəyiş
                    $guestBasket->user_id = $user->id;
                    $guestBasket->save();
                }
            }

            // artıq guest id lazım deyil
            Session::forget('uniq_id');
        }
    }
}
