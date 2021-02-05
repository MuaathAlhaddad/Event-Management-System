<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
                'resource' => 'users',
            ],
            [
                'id'    => '2',
                'title' => 'user_create',
                'resource' => 'users',
            ],
            [
                'id'    => '3',
                'title' => 'user_edit',
                'resource' => 'users',
            ],
            [
                'id'    => '4',
                'title' => 'user_show',
                'resource' => 'users',
            ],
            [
                'id'    => '5',
                'title' => 'user_delete',
                'resource' => 'users',
            ],
            [
                'id'    => '6',
                'title' => 'user_access',
                'resource' => 'users',
            ],
            [
                'id'    => '7',
                'title' => 'profile_edit',
                'resource' => 'users',
            ],
            [
                'id'    => '8',
                'title' => 'user_profile_update',
                'resource' => 'users',
            ],
            [
                'id'    => '9',
                'title' => 'permission_create',
                'resource' => 'permissions',
            ],
            [
                'id'    => '10',
                'title' => 'permission_edit',
                'resource' => 'permissions',
            ],
            [
                'id'    => '11',
                'title' => 'permission_show',
                'resource' => 'permissions',
            ],
            [
                'id'    => '12',
                'title' => 'permission_delete',
                'resource' => 'permissions',
            ],
            [
                'id'    => '13',
                'title' => 'permission_access',
                'resource' => 'permissions',
            ],
            [
                'id'    => '14',
                'title' => 'role_create',
                'resource' => 'roles',
            ],
            [
                'id'    => '15',
                'title' => 'role_edit',
                'resource' => 'roles',
            ],
            [
                'id'    => '16',
                'title' => 'role_show',
                'resource' => 'roles',
            ],
            [
                'id'    => '17',
                'title' => 'role_delete',
                'resource' => 'roles',
            ],
            [
                'id'    => '19',
                'title' => 'role_access',
                'resource' => 'roles',
            ],
            [
                'id'    => '20',
                'title' => 'event_create',
                'resource' => 'events',
            ],
            [
                'id'    => '21',
                'title' => 'event_edit',
                'resource' => 'events',
            ],
            [
                'id'    => '22',
                'title' => 'event_show',
                'resource' => 'events',
            ],
            [
                'id'    => '23',
                'title' => 'event_delete',
                'resource' => 'events',
            ],
            [
                'id'    => '24',
                'title' => 'event_access',
                'resource' => 'events',
            ],
            [
                'id'    => '25',
                'title' => 'event_restore',
                'resource' => 'events',
            ],
            [
                'id'    => '26',
                'title' => 'event_delete_permanently',
                'resource' => 'events',
            ],
            [
                'id'    => '27',
                'title' => 'event_access_deletedEvents',
                'resource' => 'events',
            ],
        ];

        Permission::insert($permissions);
    }
}
