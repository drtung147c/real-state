<?php

Route::get('/', 'HomeController@index');
Route::get('event-type/{slug}', 'EventTypeController@index')->name('event_type');
Route::get('location/{slug}', 'LocationController@index')->name('location');
Route::get('news/{slug}', 'NewsController@index')->name('new');
Route::get('news/{slug}/{id}', 'NewsController@show')->name('news.show');
Route::get('tags/{slug}', 'TagsController@index')->name('tags');
Route::get('authors/{slug}', 'AuthorsController@index')->name('authors');
Route::get('search', 'SearchController@index')->name('search')->middleware(\App\Http\Middleware\StripEmptyParams::class);
Route::get('venues/{slug}/{id}', 'VenueController@show')->name('venues.show');

Route::get('projects', 'EventTypeController@all')->name('projects');
Route::get('locations', 'LocationController@all')->name('locations');
Route::get('news', 'NewsController@all')->name('news');
Route::post('contact', 'LocationController@contact')->name('contact');

Route::redirect('/home', '/admin');
Auth::routes(['register' => false, 'verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::post('locations/media', 'LocationsController@storeMedia')->name('locations.storeMedia');
    Route::resource('locations', 'LocationsController');

    // Event Types
    Route::delete('event-types/destroy', 'EventTypesController@massDestroy')->name('event-types.massDestroy');
    Route::post('event-types/media', 'EventTypesController@storeMedia')->name('event-types.storeMedia');
    Route::resource('event-types', 'EventTypesController');

    // Venues
    Route::delete('venues/destroy', 'VenuesController@massDestroy')->name('venues.massDestroy');
    Route::post('venues/media', 'VenuesController@storeMedia')->name('venues.storeMedia');
    Route::resource('venues', 'VenuesController');

    // Venues
    Route::delete('contact/destroy', 'ContactController@massDestroy')->name('contact.massDestroy');
    Route::resource('contact', 'ContactController');

    // News
    Route::delete('news/destroy', 'NewsController@massDestroy')->name('news.massDestroy');
    Route::resource('news', 'NewsController');
    Route::post('upload', 'NewsController@upload')->name('upload');
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');

    // Tags
    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagsController');

    // Authors
    Route::delete('authors/destroy', 'AuthorsController@massDestroy')->name('authors.massDestroy');
    Route::resource('authors', 'AuthorsController');
});
