<?php

namespace App\Http\Resources;

class PermissionResource
{
    const CONTACT_DELETE         = 'contact_delete';
    const CONTACT_SHOW           = 'contact_show';
    const CONTACT_ACCESS         = 'contact_access';
    const VENUE_ACCESS           = 'venue_access';
    const VENUE_DELETE           = 'venue_delete';
    const VENUE_SHOW             = 'venue_show';
    const VENUE_EDIT             = 'venue_edit';
    const VENUE_CREATE           = 'venue_create';
    const EVENT_TYPE_ACCESS      = 'event_type_access';
    const EVENT_TYPE_DELETE      = 'event_type_delete';
    const EVENT_TYPE_SHOW        = 'event_type_show';
    const EVENT_TYPE_EDIT        = 'event_type_edit';
    const EVENT_TYPE_CREATE      = 'event_type_create';
    const LOCATION_ACCESS        = 'location_access';
    const LOCATION_DELETE        = 'location_delete';
    const LOCATION_SHOW          = 'location_show';
    const LOCATION_EDIT          = 'location_edit';
    const LOCATION_CREATE        = 'location_create';
    const USER_ACCESS            = 'user_access';
    const USER_DELETE            = 'user_delete';
    const USER_SHOW              = 'user_show';
    const USER_EDIT              = 'user_edit';
    const USER_CREATE            = 'user_create';
    const ROLE_ACCESS            = 'role_access';
    const ROLE_DELETE            = 'role_delete';
    const ROLE_SHOW              = 'role_show';
    const ROLE_EDIT              = 'role_edit';
    const ROLE_CREATE            = 'role_create';
    const PERMISSION_ACCESS      = 'permission_access';
    const PERMISSION_DELETE      = 'permission_delete';
    const PERMISSION_SHOW        = 'permission_show';
    const PERMISSION_EDIT        = 'permission_edit';
    const PERMISSION_CREATE      = 'permission_create';
    const USER_MANAGEMENT_ACCESS = 'user_management_access';
    const NEWS_ACCESS            = 'news_access';
    const NEWS_DELETE            = 'news_delete';
    const NEWS_SHOW              = 'news_show';
    const NEWS_EDIT              = 'news_edit';
    const NEWS_CREATE            = 'news_create';
    const TAGS_ACCESS            = 'tags_access';
    const TAGS_DELETE            = 'tags_delete';
    const TAGS_SHOW              = 'tags_show';
    const TAGS_EDIT              = 'tags_edit';
    const TAGS_CREATE            = 'tags_create';
    const AUTHORS_ACCESS         = 'authors_access';
    const AUTHORS_DELETE         = 'authors_delete';
    const AUTHORS_SHOW           = 'authors_show';
    const AUTHORS_EDIT           = 'authors_edit';
    const AUTHORS_CREATE         = 'authors_create';
    const NEWS_MANAGEMENT_ACCESS = 'news_management_access';

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => trans('cruds.permission.fields.contact_delete'),
                'value' => self::CONTACT_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.contact_show'),
                'value' => self::CONTACT_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.contact_access'),
                'value' => self::CONTACT_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.venue_access'),
                'value' => self::VENUE_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.venue_delete'),
                'value' => self::VENUE_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.venue_show'),
                'value' => self::VENUE_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.venue_edit'),
                'value' => self::VENUE_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.venue_create'),
                'value' => self::VENUE_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.event_type_access'),
                'value' => self::EVENT_TYPE_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.event_type_delete'),
                'value' => self::EVENT_TYPE_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.event_type_show'),
                'value' => self::EVENT_TYPE_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.event_type_edit'),
                'value' => self::EVENT_TYPE_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.event_type_create'),
                'value' => self::EVENT_TYPE_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.location_access'),
                'value' => self::LOCATION_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.location_delete'),
                'value' => self::LOCATION_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.location_show'),
                'value' => self::LOCATION_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.location_edit'),
                'value' => self::LOCATION_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.location_create'),
                'value' => self::LOCATION_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.user_access'),
                'value' => self::USER_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.user_delete'),
                'value' => self::USER_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.user_show'),
                'value' => self::USER_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.user_edit'),
                'value' => self::USER_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.user_create'),
                'value' => self::USER_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.role_access'),
                'value' => self::ROLE_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.role_delete'),
                'value' => self::ROLE_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.role_show'),
                'value' => self::ROLE_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.role_edit'),
                'value' => self::ROLE_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.role_create'),
                'value' => self::ROLE_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.permission_access'),
                'value' => self::PERMISSION_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.permission_delete'),
                'value' => self::PERMISSION_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.permission_show'),
                'value' => self::PERMISSION_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.permission_edit'),
                'value' => self::PERMISSION_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.permission_create'),
                'value' => self::PERMISSION_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.user_management_access'),
                'value' => self::USER_MANAGEMENT_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.news_access'),
                'value' => self::NEWS_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.news_delete'),
                'value' => self::NEWS_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.news_show'),
                'value' => self::NEWS_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.news_edit'),
                'value' => self::NEWS_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.news_create'),
                'value' => self::NEWS_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.tags_access'),
                'value' => self::TAGS_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.tags_delete'),
                'value' => self::TAGS_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.tags_show'),
                'value' => self::TAGS_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.tags_edit'),
                'value' => self::TAGS_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.tags_create'),
                'value' => self::TAGS_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.authors_access'),
                'value' => self::AUTHORS_ACCESS
            ],
            [
                'label' => trans('cruds.permission.fields.authors_delete'),
                'value' => self::AUTHORS_DELETE
            ],
            [
                'label' => trans('cruds.permission.fields.authors_show'),
                'value' => self::AUTHORS_SHOW
            ],
            [
                'label' => trans('cruds.permission.fields.authors_edit'),
                'value' => self::AUTHORS_EDIT
            ],
            [
                'label' => trans('cruds.permission.fields.authors_create'),
                'value' => self::AUTHORS_CREATE
            ],
            [
                'label' => trans('cruds.permission.fields.news_management_access'),
                'value' => self::NEWS_MANAGEMENT_ACCESS
            ],
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
