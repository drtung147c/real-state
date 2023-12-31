<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            EventTypesTableSeeder::class,
            LocationsTableSeeder::class,
            VenuesTableSeeder::class,
            TagsTableSeeder::class,
            AuthorsTableSeeder::class,
            NewsTableSeeder::class,
        ]);
    }
}
