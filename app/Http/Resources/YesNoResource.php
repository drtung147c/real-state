<?php

namespace App\Http\Resources;

class YesNoResource
{
    const YES = 1;
    const NO  = 0;

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => trans('global.yes'),
                'value' => self::YES
            ],
            [
                'label' => trans('global.no'),
                'value' => self::NO
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
        return $value ? trans('global.yes') : trans('global.no');
    }
}
