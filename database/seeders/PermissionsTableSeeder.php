<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'category_create',
            ],
            [
                'title' => 'category_edit',
            ],
            [
                'title' => 'category_show',
            ],
            [
                'title' => 'category_delete',
            ],
            [
                'title' => 'category_access',
            ],
            [
                'title' => 'label_create',
            ],
            [
                'title' => 'label_edit',
            ],
            [
                'title' => 'label_show',
            ],
            [
                'title' => 'label_delete',
            ],
            [
                'title' => 'label_access',
            ],
            [
                'title' => 'ticket_create',
            ],
            [
                'title' => 'ticket_edit',
            ],
            [
                'title' => 'ticket_show',
            ],
            [
                'title' => 'ticket_delete',
            ],
            [
                'title' => 'ticket_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
        ];

        Permission::insert($permissions);
    }
}

