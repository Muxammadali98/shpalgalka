<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true
        ]);
        $user = User::create([
            'name' => 'Hodim',
            'email' => 'worker@gmail.com',
            'password' => Hash::make('worker123'),
            'is_admin' => false
        ]);
    }
}
