<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Schema::hasColumn('users', 'role')) {
            if (isset($this->command)) {
                $this->command->error('Error: The "role" column is missing in the "users" table.');
                $this->command->info('Please run "php artisan migrate" to apply the latest database changes.');
            }
            return;
        }

        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@demo.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // Create Normal User
        User::updateOrCreate(
            ['email' => 'user@demo.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );
    }
}
