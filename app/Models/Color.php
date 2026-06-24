<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $fillable = [
        'color_code',
        'img',
        
    ];


    public function colorTranslations()
    {
        return $this->hasMany(ColorTranslation::class, 'color_id', 'id');
    }
}
