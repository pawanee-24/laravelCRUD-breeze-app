<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        $admin = User::firstOrCreate([
            'name' => 'System Admin',
            'email' => 'admin@ecom.com',
            'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD', 'Admin@123')),
        ]);
        $admin->assignRole('Admin');

        // Manager User
        $manager = User::firstOrCreate([
            'name' => 'Manager User',
            'email' => 'manager@ecom.com',
            'password' => Hash::make(env('DEFAULT_MANAGER_PASSWORD', 'Manager@123')),
        ]);
        $manager->assignRole('Manager');

        // Cashier User
        $cashier = User::firstOrCreate([
            'name' => 'Cashier User',
            'email' => 'cashier@ecom.com',
            'password' => Hash::make(env('DEFAULT_CASHIER_PASSWORD', 'Cashier@123')),
        ]);
        $cashier->assignRole('Cashier');
    }
}
