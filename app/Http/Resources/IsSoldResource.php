<?php

namespace App\Http\Resources;

class IsSoldResource
{
    const IS_SOLD  = 1;
    const NOT_SOLD = 0;

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => trans('global.is_sold'),
                'value' => self::IS_SOLD
            ],
            [
                'label' => trans('global.not_sold'),
                'value' => self::NOT_SOLD
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
        return $value ? trans('global.is_sold') : trans('global.not_sold');
    }
}
