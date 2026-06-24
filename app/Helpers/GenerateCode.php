<?php
namespace App\Helpers;

use App\Models\Post;
use App\Models\User;

class GenerateCode
{
    public static function confirmation()
    {
        do {
            $code = rand(1000, 9999);
            $exists = User::where('confirmation_code', $code)->exists();
        } while ($exists);

        return $code;
    }

    public static function postNo()
    {
        do {
            $code = rand(1000000, 9999999);
            $exists = Post::where('post_no', $code)->exists();
        } while ($exists);

        return $code;
    }

    public static function username()
    {
        do {
            $code = rand(1000000, 9999999);
            $exists = User::where('username', $code)->exists();
        } while ($exists);

        return $code;
    }
}
