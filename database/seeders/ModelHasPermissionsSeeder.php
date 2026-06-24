<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('model_has_permissions')->insert([
            'permission_id' => 1, // icazə ID-si
            'model_type' => 'App\Models\User', // hansı modeldə istifadə olunur
            'model_id' => 1, // istifadəçi ID-si
        ]);

        DB::table('model_has_permissions')->insert([
            'permission_id' => 2, // icazə ID-si
            'model_type' => 'App\Models\User', // hansı modeldə istifadə olunur
            'model_id' => 1, // istifadəçi ID-si
        ]);

        DB::table('model_has_permissions')->insert([
            'permission_id' => 3, // icazə ID-si
            'model_type' => 'App\Models\User', // hansı modeldə istifadə olunur
            'model_id' => 1, // istifadəçi ID-si
        ]);

        DB::table('model_has_permissions')->insert([
            'permission_id' => 4, // icazə ID-si
            'model_type' => 'App\Models\User', // hansı modeldə istifadə olunur
            'model_id' => 1, // istifadəçi ID-si
        ]);
    }
}
