<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['serviceTranslations'];


    public function serviceTranslations()
    {
        return $this->hasMany(ServiceTranslation::class, 'service_id', 'id');
    }

    

   
    
    public function scopeActive($query)
    {
        return $query->where('status','1');
    }

    
}
