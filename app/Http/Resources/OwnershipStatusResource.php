<?php

namespace App\Http\Resources;

class OwnershipStatusResource
{
    const ALL = 1;
    const OWNER  = 0;

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => trans('global.pleaseSelect'),
                'value' => ''
            ],
            [
                'label' => trans('global.all_status'),
                'value' => self::ALL
            ],
            [
                'label' => trans('global.owner_status'),
                'value' => self::OWNER
            ]
        ];
    }

    /**
     * @param $value
     *
     * @return int
     */
    public function getLabel($value)
    {
        return $value ? trans('global.all_status') : trans('global.owner_status');
    }
}
