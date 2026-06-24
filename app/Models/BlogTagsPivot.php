<?php

namespace App\Models;

use App\Models\PageTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogTagsPivot extends Model
{
     use HasFactory, SoftDeletes;

    protected $table = 'blog_tags_pivot';
    protected $fillable = ['blog_id','tag_id'];


    public function tag()
    {
        return $this->hasOne(BlogTags::class, 'id', 'tag_id');
    }
}
