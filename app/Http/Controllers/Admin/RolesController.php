<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Permission;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class RolesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies(PermissionResource::ROLE_ACCESS), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all();
        $permissionResource = new PermissionResource();

        return view('admin.roles.index', compact('roles', 'permissionResource'));
    }

    public function create()
    {
        abort_if(Gate::denies(PermissionResource::ROLE_CREATE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');
        $permissionResource = new PermissionResource();

        return view('admin.roles.create', compact('permissions', 'permissionResource'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies(PermissionResource::ROLE_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $role->load('permissions');
        $permissionResource = new PermissionResource();

        return view('admin.roles.edit', compact('permissions', 'role', 'permissionResource'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies(PermissionResource::ROLE_SHOW), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');
        $permissionResource = new PermissionResource();

        return view('admin.roles.show', compact('role', 'permissionResource'));
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies(PermissionResource::ROLE_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
