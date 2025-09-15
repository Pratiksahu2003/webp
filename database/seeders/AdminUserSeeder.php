<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'admin@wezom.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@wezom.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Output admin credentials for reference
        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@wezom.com');
        $this->command->info('Password: admin123');
        $this->command->warn('Please change the default password after first login.');
    }
}
