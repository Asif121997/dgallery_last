<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['optionTranslations'];


    public function optionTranslations()
    {
        return $this->hasMany(OptionTranslation::class, 'option_id', 'id');
    }

    public function optionGroup()
    {
        return $this->belongsTo(OptionGroup::class, 'option_group_id', 'id');
    }
    
    public function option_group()
    {
        return $this->hasMany(OptionGroup::class, 'id', 'option_group_id');
    }

    
    public function scopeActive($query)
    {
        return $query->where('status','1');
    }

    public function carOptions()
    {
        return $this->hasMany(CarOptions::class);
    }
}
