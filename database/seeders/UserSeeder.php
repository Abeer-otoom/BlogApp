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
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@blog.com',
                'password' => Hash::make('123456789'),
            ],

            [
                'name' => 'user1',
                'email' => 'user1@blog.com',
                'password' => Hash::make('123456789'),
            ],


            [
                'name' => 'user2',
                'email' => 'user2@blog.com',
                'password' => Hash::make('123456789'),
            ],

            [
                'name' => 'user3',
                'email' => 'user3@blog.com',
                'password' => Hash::make('123456789'),
            ],
        ];

        User::insert($data);
    }
}
