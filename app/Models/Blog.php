<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['blogTranslations'];


    public function blogTranslations()
    {
        return $this->hasMany(BlogTranslation::class, 'blog_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

   
    
    public function scopeActive($query)
    {
        return $query->where('status','1');
    }

    
}
