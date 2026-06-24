<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function settingsTranslations()
    {
        return $this->hasMany(SettingsTranslation::class, 'settings_id', 'id');
    }
}
