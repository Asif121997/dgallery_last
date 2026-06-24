<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionGroup extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $with = ['optionGroupTranslations','options'];


    public function optionGroupTranslations()
    {
        return $this->hasMany(OptionGroupTranslation::class, 'option_group_id', 'id');
    }
    
    


    
    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
    
    public function options(){
        return $this->hasMany(Option::class,'option_group_id','id')->orderBy('order','asc');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'option_group_categories', 'option_group_id', 'category_id');
    }


}
