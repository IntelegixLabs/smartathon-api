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
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@admin.com',
                'is_user' => 0,
                'is_admin' => 1,
                'password' => Hash::make('12345678')
            ],
            [
                'first_name' => 'Sayan',
                'last_name' => 'Sinha',
                'email' => 'sayansinha@gmail.com',
                'is_user' => 1,
                'is_admin' => 0,
                'password' => Hash::make('12345678')
            ]
        ]);
    }
}
