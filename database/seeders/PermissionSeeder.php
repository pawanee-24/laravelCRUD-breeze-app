<?php

namespace Database\Seeders;

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

            // Dashboard
            ['name' => 'view.dashboard', 'description' => 'View dashboard'],

            // User management
            ['name' => 'view.users', 'description' => 'View users list'],
            ['name' => 'create.users', 'description' => 'Create new users'],
            ['name' => 'update.users', 'description' => 'Update existing users'],
            ['name' => 'delete.users', 'description' => 'Delete users'],
            ['name' => 'manage.user.status', 'description' => 'Activate or Deactivate users'],

            // Role management
            ['name' => 'view.roles', 'description' => 'View role list'],
            ['name' => 'create.roles', 'description' => 'Create new roles'],
            ['name' => 'update.roles', 'description' => 'Update existing roles'],
            ['name' => 'delete.roles', 'description' => 'Delete roles'],

            // Permission management
            ['name' => 'view.permissions', 'description' => 'View permission list'],
            ['name' => 'create.permissions', 'description' => 'Create new permissions'],
            ['name' => 'update.permissions', 'description' => 'Update existing permissions'],
            ['name' => 'delete.permissions', 'description' => 'Delete permissions'],

            // Products
            ['name' => 'view.products', 'description' => 'View products list'],
            ['name' => 'create.products', 'description' => 'Create products'],
            ['name' => 'update.products', 'description' => 'Update existing products'],
            ['name' => 'delete.products', 'description' => 'Delete products'],

            // Brands management
            ['name' => 'view.brands', 'description' => 'View brands list'],
            ['name' => 'create.brands', 'description' => 'Create brands'],
            ['name' => 'update.brands', 'description' => 'Update existing brands'],
            ['name' => 'delete.brands', 'description' => 'Delete brands'],

            // Categories management
            ['name' => 'view.categories', 'description' => 'View categories list'],
            ['name' => 'create.categories', 'description' => 'Create categories'],
            ['name' => 'update.categories', 'description' => 'Update existing categories'],
            ['name' => 'delete.categories', 'description' => 'Delete categories'],

            // Report management
            ['name' => 'view.reports', 'description' => 'View reports'],
            ['name' => 'create.reports', 'description' => 'Create reports'],
            ['name' => 'export.reports', 'description' => 'Export reports'],

            // Settings
            ['name' => 'view.settings', 'description' => 'View system settings'],
            ['name' => 'update.settings', 'description' => 'Update system settings'],

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name'], 'guard_name' => 'web'],
                ['description' => $permission['description']]
            );
        }

        
    }
}
