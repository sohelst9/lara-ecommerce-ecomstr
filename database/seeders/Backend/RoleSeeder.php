<?php

namespace Database\Seeders\Backend;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'administrator', 'guard_name' => 'admin'],
            ['name' => 'moderator', 'guard_name' => 'admin'],
            ['name' => 'editor', 'guard_name' => 'admin'],
            ['name' => 'order_manage', 'guard_name' => 'admin'],
            ['name' => 'viewer', 'guard_name' => 'admin']
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
