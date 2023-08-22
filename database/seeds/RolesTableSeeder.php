<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'title' => 'Quản trị',
            ],
            [
                'id' => 2,
                'title' => 'Hỗ trợ quản trị',
            ],
            [
                'id' => 3,
                'title' => 'Chủ đầu tư',
            ],
            [
                'id' => 4,
                'title' => 'Người bán',
            ],
        ];

        Role::insert($roles);
    }
}
