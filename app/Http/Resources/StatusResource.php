<?php

namespace App\Http\Resources;

class StatusResource
{
    const ENABLED  = 1;
    const DISABLED = 0;

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => trans('global.enabled'),
                'value' => self::ENABLED
            ],
            [
                'label' => trans('global.disabled'),
                'value' => self::DISABLED
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
        return $value ? trans('global.enabled') : trans('global.disabled');
    }
}
