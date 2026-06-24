<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['pageTranslations'];


    public function pageTranslations()
    {
        return $this->hasMany(PageTranslation::class, 'page_id', 'id');
    }

    

    
}
