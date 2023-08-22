<?php

namespace App\Http\Requests;

use App\EventType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class UpdateEventTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies(PermissionResource::EVENT_TYPE_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
