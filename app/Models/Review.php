<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['reviewTranslations'];


    public function reviewTranslations()
    {
        return $this->hasMany(ReviewTranslation::class, 'review_id', 'id');
    }

   
    
    public function scopeActive($query)
    {
        return $query->where('status','1');
    }

    
}
