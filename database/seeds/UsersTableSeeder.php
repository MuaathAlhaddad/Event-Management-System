<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                [
                    'id'             => 1,
                    'name'           => 'admin',
                    'email'          => 'admin@admin.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ], 
                [
                    'id'             => 2,
                    'name'           => 'Ali',
                    'email'          => 'ali@staff.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 3,
                    'name'           => 'Muaath Almrham',
                    'email'          => 'muaath@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 4,
                    'name'           => 'Read',
                    'email'          => 'read@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 5,
                    'name'           => 'Asma',
                    'email'          => 'asma@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 6,
                    'name'           => 'Amal',
                    'email'          => 'amal@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 7,
                    'name'           => 'Asia',
                    'email'          => 'asia@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 8,
                    'name'           => 'Mustfa',
                    'email'          => 'mustfa@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 9,
                    'name'           => 'Naif',
                    'email'          => 'naif@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 10,
                    'name'           => 'Muna',
                    'email'          => 'muna@student.com',
                    'password'       => Hash::make('password'),
                    'remember_token' => null,
                ],
            ],
        ];

        foreach ($users as $key => $user) {
            User::insert($user);
        }
    }
}
