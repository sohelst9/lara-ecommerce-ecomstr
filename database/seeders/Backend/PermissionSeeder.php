<?php

namespace Database\Seeders\Backend;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'view-role', 'guard_name' => 'admin'],
            ['name' => 'create-role', 'guard_name' => 'admin'],
            ['name' => 'edit-role', 'guard_name' => 'admin'],
            ['name' => 'delete-role', 'guard_name' => 'admin'],
            ['name' => 'view-permission', 'guard_name' => 'admin'],
            ['name' => 'create-permission', 'guard_name' => 'admin'],
            ['name' => 'edit-permission', 'guard_name' => 'admin'],
            ['name' => 'delete-permission', 'guard_name' => 'admin'],
            ['name' => 'view-staff', 'guard_name' => 'admin'],
            ['name' => 'create-staff', 'guard_name' => 'admin'],
            ['name' => 'edit-staff', 'guard_name' => 'admin'],
            ['name' => 'delete-staff', 'guard_name' => 'admin'],
            ['name' => 'view-category', 'guard_name' => 'admin'],
            ['name' => 'create-category', 'guard_name' => 'admin'],
            ['name' => 'edit-category', 'guard_name' => 'admin'],
            ['name' => 'delete-category', 'guard_name' => 'admin'],
            ['name' => 'view-color', 'guard_name' => 'admin'],
            ['name' => 'create-color', 'guard_name' => 'admin'],
            ['name' => 'edit-color', 'guard_name' => 'admin'],
            ['name' => 'delete-color', 'guard_name' => 'admin'],
            ['name' => 'view-size', 'guard_name' => 'admin'],
            ['name' => 'create-size', 'guard_name' => 'admin'],
            ['name' => 'edit-size', 'guard_name' => 'admin'],
            ['name' => 'delete-size', 'guard_name' => 'admin'],
            ['name' => 'view-product', 'guard_name' => 'admin'],
            ['name' => 'create-product', 'guard_name' => 'admin'],
            ['name' => 'edit-product', 'guard_name' => 'admin'],
            ['name' => 'delete-product', 'guard_name' => 'admin'],
            ['name' => 'show-variation', 'guard_name' => 'admin'],
            ['name' => 'create-variation', 'guard_name' => 'admin'],
            ['name' => 'edit-variation', 'guard_name' => 'admin'],
            ['name' => 'delete-variation', 'guard_name' => 'admin'],
            ['name' => 'view-customer', 'guard_name' => 'admin']
        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }
    }
}
