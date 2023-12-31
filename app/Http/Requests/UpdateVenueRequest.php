<?php

namespace App\Http\Requests;

use App\Venue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class UpdateVenueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies(PermissionResource::VENUE_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'           => [
                'required',
            ],
            'slug'           => [
                'required',
            ],
            'location_id'    => [
                'required',
                'integer',
            ],
            'event_types.*'  => [
                'integer',
            ],
            'event_types'    => [
                'array',
            ],
            'address'        => [
                'required',
            ],
        ];
    }
}
