<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Role
        $admin = Role::firstOrCreate(['name' => 'Admin', 'description' => 'Administrator with full access']);
        $manager = Role::firstOrCreate(['name' => 'Manager', 'description' => 'Manager with limited administrative access']);
        $cashier = Role::firstOrCreate(['name' => 'Cashier', 'description' => 'Regular User']);

        // Admin get all permissions
        $admin->syncPermissions(Permission::all());

        // Manager permissions
        $manager->syncPermissions([
            'view.dashboard',

            'view.users',
            'create.users',
            'update.users',
            'delete.users',
            'manage.user.status',

            'view.categories',
            'create.categories',
            'update.categories',
            'delete.categories',

            'view.brands',
            'create.brands',
            'update.brands',
            'delete.brands',

            'view.products',
            'create.products',
            'update.products',
            'delete.products',

            'view.settings',
            'update.settings',

            'view.reports',
            'create.reports',
            'export.reports',
        ]);

        // Cashier permissions
        $cashier->syncPermissions([
            'view.dashboard',

            'view.categories',
            'create.categories',
            'update.categories',
            'delete.categories',

            'view.brands',
            'create.brands',
            'update.brands',
            'delete.brands',

            'view.products',
            'create.products',
            'update.products',
            'delete.products',

        ]);

    }
}
