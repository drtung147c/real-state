<?php

namespace App\Http\Requests;

use App\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies(PermissionResource::LOCATION_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'slug' => [
                'required',
            ],
        ];
    }
}
