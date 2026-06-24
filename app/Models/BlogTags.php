<?php

namespace App\Models;

use App\Models\PageTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogTags extends Model
{
     use HasFactory, SoftDeletes;

    protected $table = 'blog_tags';
    protected $fillable = ['name'];
}
