<?php

namespace App\Http\Resources;

class HouseStatusResource
{
    const OLD = 0;
    const NEW  = 1;

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
                'label' => trans('global.new'),
                'value' => self::NEW
            ],
            [
                'label' => trans('global.old'),
                'value' => self::OLD
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
        return $value ? trans('global.new') : trans('global.old');
    }
}
