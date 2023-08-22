<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'title' => Role::ROLES['Admin'],
            ],
            [
                'id' => 2,
                'title' => Role::ROLES['Agent'],
            ],
        ];

        Role::insert($roles);
    }
}

