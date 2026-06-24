<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = [];


    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    
}
