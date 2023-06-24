<?php

Auth::routes(['register' => false]);
Route::redirect('/', '/BrainTech');
Route::redirect('/admin', '/dashboard');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
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



    // Settings
    Route::resource('settings', 'SettingController');
    // Route::post('/settings', 'SettingController@store')->name('settings');

    // CMS - Page Management
    Route::resource('pages', 'PageController');
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');

    // Mail Template Management
    Route::resource('mails-template', 'MailTemplateController');
    Route::delete('mails-template/destroy', 'MailTemplateController@massDestroy')->name('mails-template.massDestroy');

    // Fetch Categories
    // Route::post('fetch-category', 'CategoryController@fetchCategory')->name('fetch-category');

    Route::resource('clients','ClientController');

    Route::resource('projects','ProjectController');

    // Get Attribute Values
    Route::post('get-attribute-values', 'AttributesController@getAttributeValues')->name('get-attribute-values');
    Route::resource('news', 'NewsController');

});

Route::post('get-state', 'HomeController@getState')->name('get-state');

Route::get('/images/{folder}/{img}/{width}/{height}',function($folder, $img, $width = 200, $height = 200){
    return \Image::make(public_path("/$folder/$img"))->resize($width, $height)->response('jpg');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect('/')->with('success', trans('messages.success'));
 })->name('clear-cache');
