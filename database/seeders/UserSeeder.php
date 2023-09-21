<?php

namespace Database\Seeders;

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
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@app.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@app.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@app.com',
                'password' => Hash::make('password'),
            ],
        ];
        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
