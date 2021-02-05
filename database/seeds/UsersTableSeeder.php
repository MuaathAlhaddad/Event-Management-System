<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'   => 1,
                'name' => 'Muaath Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                            I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                            including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'muaath@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'm',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'male_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ], 
            [
                'id'   => 2,
                'name' => 'Ali Alwani',
                'bio'  => "I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.",    
                'email'          => 'ali@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'm',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'male_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 3,
                'name' => 'Read Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'read@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'm',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'male_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 4,
                'name' => 'Sarah Alnhari',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'sarah@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'f',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'female_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 5,
                'name' => 'Asma Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'asma@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'f',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'female_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 6,
                'name' => 'Amal Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'amal@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'f',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'female_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 7,
                'name' => 'Asia Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'asia@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'f',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'female_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 8,
                'name' => 'Mustfa Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'mustfa@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'm',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'male_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 9,
                'name' => 'Naif Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'naif@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'm',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'male_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 10,
                'name' => 'Muna Almrham',
                'bio'  => 'I am an Administrative Assistant with eight years of experience working alongside the executive team of a Fortune 500 company.
                                        I specialize in administrative technology and is responsible for educating other employees on using progressive systems and applications,
                                        including accounting software, mass communication procedures and organizational apps.',
                'email'          => 'muna@example.com',
                'phone'          => '+60112868439',
                'sex'            => 'f',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'female_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 11,
                'name' => 'VI ACADEMY SDN BHD',
                'bio'  => '“أكاديمية VI هي شركة تأسست منذ عام 2009 بخلفية تعليمية لتطوير رأس المال البشري. نحن نركز في 3 مجالات رئيسية: 1) اللغات 2) التدريب 3) الترجمة.
                نحن نقدم مجموعة واسعة من الخدمات ، والتي تشمل التدريب في تنمية الموارد البشرية ، ودورات اللغة للكبار والأطفال بالإضافة إلى خدمات الترجمة بلغات مختارة.',
                'email'          => 'info@viacademy.com',
                'phone'          => '+60112868439',
                'country'        => 'Malaysia',
                'state'          => 'Selangor',
                'avatar'         => 'school_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
            [
                'id'   => 12,
                'name' => 'ELC SDN BHD',
                'bio'  => 'أكاديمية VI هي شركة تأسست منذ عام 2009 بخلفية تعليمية لتطوير رأس المال البشري. نحن نركز في 3 مجالات رئيسية: 1) اللغات 2) التدريب 3) الترجمة.
                نحن نقدم مجموعة واسعة من الخدمات ، والتي تشمل التدريب في تنمية الموارد البشرية ، ودورات اللغة للكبار والأطفال بالإضافة إلى خدمات الترجمة بلغات مختارة.',
                'email'          => 'info@elc.com',
                'phone'          => '+60112868439',
                'country'        => 'Malaysia',
                'state'          => 'Kuala Lumpur',
                'avatar'         => 'school_avatar.png',
                'dob'            => date('Y-m-d', strtotime('1995-05-09')),
                'password'       => Hash::make('password'),
                'created_at'     => date('Y-m-d h:m:s'),
                'remember_token' => null,
            ],
        ];

        foreach ($users as $key => $value) {
            /** Create the users */
            $user = User::create($value);

            /** Setup the reltions */
            if($key == 0) {
                $user->roles()->sync(Role::whereTitle('admin')->pluck('id'));
                $user->save();
            } elseif($key == 10 || $key == 11) {
                $user->roles()->sync(Role::whereTitle('school')->pluck('id'));
                $user->save();
            } else {
                $user->roles()->sync(Role::whereTitle('staff')->pluck('id'));
                $user->save();
            }
        }
    }
}
