<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'phone'          => '0912345678',
                'bod'            => '1998-09-20',
                'is_super_admin' => 1,
                'password'       => '$2y$10$Mzyj0HLYQuq2P4768MZRQOspzyqb/1lddcWyaPY.vA.rlkxY4mc/a',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
