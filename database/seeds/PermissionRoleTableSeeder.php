<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use App\Http\Resources\PermissionResource;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            switch ($i) {
                case 1:
                case 2:
                    Role::findOrFail($i)->permissions()->sync(Permission::all()->pluck('id'));
                    break;
                case 3:
                    $role = [
                        PermissionResource::EVENT_TYPE_ACCESS,
                        PermissionResource::EVENT_TYPE_EDIT,
                        PermissionResource::EVENT_TYPE_CREATE,
                        PermissionResource::EVENT_TYPE_DELETE,
                        PermissionResource::EVENT_TYPE_SHOW,
                    ];
                    Role::findOrFail($i)->permissions()->sync(Permission::whereIn('title', $role)->pluck('id'));
                    break;
                case 4:
                    $role = [
                        PermissionResource::VENUE_ACCESS,
                        PermissionResource::VENUE_CREATE,
                        PermissionResource::VENUE_DELETE,
                        PermissionResource::VENUE_EDIT,
                        PermissionResource::VENUE_SHOW,
                    ];
                    Role::findOrFail($i)->permissions()->sync(Permission::whereIn('title', $role)->pluck('id'));
                    break;
            }
        }
    }
}
