<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;
    protected $table = 'store';
    protected $fillable = ['name','email','phone','address','created_at','updated_at','deleted_at'];
    protected $guarded = [];
    public $with = [];

    
}
