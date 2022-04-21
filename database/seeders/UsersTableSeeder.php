<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
            [
                'name' => 'Administrator',
                'email' => 'iamadmin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'User Basic',
                'email' => 'iamuser@gmail.com',
                'role' => 'basic',
                'password' => Hash::make('12345678'),
            ]
        ]);
    }
}
