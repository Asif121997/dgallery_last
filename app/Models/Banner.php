<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['bannerTranslations'];


    public function bannerTranslations()
    {
        return $this->hasMany(BannerTranslation::class, 'banner_id', 'id');
    }


    public function scopeRowOne($query)
    {
        return $query->where('row','1');
    }

    public function scopeRowTwo($query)
    {
        return $query->where('row','2');
    }

    public function scopeRowThree($query)
    {
        return $query->where('row','3');
    }


    
}
