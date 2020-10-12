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
                    'first_name'           => 'admin',
                    'last_name'           => 'admin',
                    'phone_number'           => '01112223334',
                    'email'          => 'admin@admin.com',
                    'gender'          => 'm',
                    'password'       => Hash::make('admin'),
                    'remember_token' => null,
                ], 
                [
                    'id'             => 2,
                    'first_name'           => 'Ali',
                    'last_name'           => 'Alwani',
                    'phone_number'           => '01112223334',
                    'email'          => 'ali@staff.com',
                    'gender'          => 'm',
                    'password'       => Hash::make('ali'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 3,
                    'first_name'           => 'Muaath',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'muaath@student.com',
                    'gender'          => 'm',
                    'password'       => Hash::make('muaath'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 4,
                    'first_name'           => 'Read',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'read@student.com',
                    'gender'          => 'm',
                    'password'       => Hash::make('read'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 5,
                    'first_name'           => 'Asma',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'asma@student.com',
                    'gender'          => 'f',
                    'password'       => Hash::make('asma'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 6,
                    'first_name'           => 'Amal',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'amal@student.com',
                    'gender'          => 'f',
                    'password'       => Hash::make('amal'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 7,
                    'first_name'           => 'Asia',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'asia@student.com',
                    'gender'          => 'f',
                    'password'       => Hash::make('asia'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 8,
                    'first_name'           => 'Mustfa',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'mustfa@student.com',
                    'gender'          => 'm',
                    'password'       => Hash::make('mustfa'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 9,
                    'first_name'           => 'Naif',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'naif@student.com',
                    'gender'          => 'm',
                    'password'       => Hash::make('naif'),
                    'remember_token' => null,
                ],
                [
                    'id'             => 10,
                    'first_name'           => 'Muna',
                    'last_name'           => 'Esmail',
                    'phone_number'           => '01112223334',
                    'email'          => 'muna@student.com',
                    'gender'          => 'f',
                    'password'       => Hash::make('muna'),
                    'remember_token' => null,
                ],
            ],
        ];

        foreach ($users as $key => $user) {
            User::insert($user);
        }
    }
}
