<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class UpdateAuthorsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies(PermissionResource::AUTHORS_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:authors,slug,' . request()->route('author')->id,
            ],
        ];
    }
}
