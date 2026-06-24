<?php
namespace App\Helpers;

class GetStatusOfRow
{
    public static function status($row)
    {
        if ($row->status == 1){
            return '<span class="badge badge-success">Active</span>';
        }elseif($row->status == 0){
            return '<span class="badge badge-danger">Deactive</span>';
        }elseif($row->status == 2){
            return '<span class="badge badge-warning">Pending</span>';
        }else{
            return '<span class="badge badge-secondary">Expired</span>';
        }
    }

    public static function availability($row)
    {
        if($row->status == '1'){
            return '<span class="badge badge-success">Exists</span>';
        }else{
            return '<span class="badge badge-danger">Don\'t Exists</span>';
        }
    }
}
