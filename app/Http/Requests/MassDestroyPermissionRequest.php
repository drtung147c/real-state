<?php

namespace App\Http\Requests;

use App\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class MassDestroyPermissionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies(PermissionResource::PERMISSION_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:permissions,id',
        ];
    }
}
