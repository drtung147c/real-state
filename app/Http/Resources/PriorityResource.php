<?php

namespace App\Http\Resources;

class PriorityResource
{
    const NORMAL = 0;
    const VIP  = 1;
    const SUPPER_VIP  = 2;

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => trans('global.priority_normal'),
                'value' => self::NORMAL
            ],
            [
                'label' => trans('global.priority_vip'),
                'value' => self::VIP
            ],
            [
                'label' => trans('global.priority_supper_vip'),
                'value' => self::SUPPER_VIP
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
        $label = '';
        foreach ($this->toOptionArray() as $option) {
            if ($value == $option['value']) {
                $label = $option['label'];
            }
        }

        return $label;
    }
}
