<?php

namespace App\Models;

use App\Models\PageTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OneClickOrder extends Model
{
     use HasFactory, SoftDeletes;

    protected $table = 'one_click_orders';
    protected $fillable = ['product_id','phone'];
    
    
    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

}
