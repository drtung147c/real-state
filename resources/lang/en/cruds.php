<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'location'       => [
        'title'          => 'Locations',
        'title_singular' => 'Location',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'slug'              => 'Slug',
            'slug_helper'       => '',
            'photo'             => 'Photo',
            'photo_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'eventType'      => [
        'title'          => 'Event Types',
        'title_singular' => 'Event Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'slug'              => 'Slug',
            'slug_helper'       => '',
            'photo'             => 'Photo',
            'photo_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'venue'          => [
        'title'          => 'Venues',
        'title_singular' => 'Venue',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'name'                  => 'Name',
            'name_helper'           => '',
            'slug'                  => 'Slug',
            'slug_helper'           => '',
            'location'              => 'Location',
            'location_helper'       => '',
            'event_types'           => 'Event Types',
            'event_types_helper'    => '',
            'address'               => 'Address',
            'address_helper'        => '',
            'latitude'              => 'Latitude',
            'latitude_helper'       => '',
            'longitude'             => 'Longitude',
            'longitude_helper'      => '',
            'description'           => 'Description',
            'description_helper'    => '',
            'features'              => 'Features',
            'features_helper'       => '',
//            'people_minimum'        => 'People Minimum',
//            'people_minimum_helper' => '',
//            'people_maximum'        => 'People Maximum',
//            'people_maximum_helper' => '',
            'price'        => 'Price Per Hour',
            'price_helper' => '',
            'main_photo'            => 'Main Photo',
            'main_photo_helper'     => '',
            'gallery'               => 'Gallery',
            'gallery_helper'        => '',
            'is_featured'           => 'Is Featured',
            'is_featured_helper'    => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
];
