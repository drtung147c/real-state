<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class UpdateTagsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies(PermissionResource::TAGS_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:tags,slug,' . request()->route('tag')->id,
            ],
        ];
    }
}
