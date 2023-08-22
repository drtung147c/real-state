<?php

use App\Permission;
use Illuminate\Database\Seeder;
use App\Http\Resources\PermissionResource;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissionResource = new PermissionResource();
        $permissions = [];
        foreach ($permissionResource->toOptionArray() as $key => $option) {
            $permissions[] = [
                'title' => $option['value']
            ];
        }

        Permission::insert($permissions);
    }
}
