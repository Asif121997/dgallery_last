<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionGroupsCategories extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $table = 'option_group_categories';

    public function optionGroups(){
        return $this->hasOne(OptionGroup::class,'id','option_group_id')->orderBy('order','asc');
    }
    
}
