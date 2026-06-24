<?php
namespace App\Helpers;

class CheckBadge
{
    public static function delivery($row)
    {
        if($row->postBadge->contains('badge_id', 2)){
            return 'Bəli';
        }else{
            return 'Xeyr';
        }
    }
    public static function credit($row)
    {
        if($row->postBadge->contains('badge_id', 5)){
            return 'Bəli';
        }else{
            return 'Xeyr';
        }
    }
    public static function barter($row)
    {
        if($row->postBadge->contains('badge_id', 3)){
            return 'Bəli';
        }else{
            return 'Xeyr';
        }
    }

}