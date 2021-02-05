<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'School',
            ],
            [
                'id'    => 3,
                'title' => 'Staff',
            ],
        ];

        Role::insert($roles);

        /**
         * Give Role Permissions
         */
        Role::findOrFail(1)->permissions()->sync(Permission::pluck('id'));
        Role::findOrFail(2)->permissions()->sync(Permission::resource('events')->pluck('id'));
        Role::findOrFail(3)->permissions()->sync(Permission::resource('users')->pluck('id'));
    }
}
