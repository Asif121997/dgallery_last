<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'users index',
            'users create',
            'users edit',
            'users delete',
            'colors index',
            'colors create',
            'colors edit',
            'colors delete',
            'option_groups index',
            'option_groups create',
            'option_groups edit',
            'option_groups delete',
            'options index',
            'options create',
            'options edit',
            'options delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
