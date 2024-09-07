<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@carbonitor.com',
            'password' => Hash::make('12345678'), // Hashing the password
            'is_approved' => true,
        ]);
    }
}
