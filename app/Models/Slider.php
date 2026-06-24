<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['sliderTranslations'];


    public function sliderTranslations()
    {
        return $this->hasMany(SliderTranslation::class, 'slider_id', 'id');
    }

   
    
    public function scopeActive($query)
    {
        return $query->where('status','1');
    }

    
}
