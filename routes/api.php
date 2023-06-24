<?php

//register api
Route::post('register', [App\Http\Controllers\Api\V1\AuthController::class, 'register']);
Route::post('verify-otp', [App\Http\Controllers\Api\V1\AuthController::class, 'verifyOtp']);

Route::post('resend-otp', [App\Http\Controllers\Api\V1\AuthController::class, 'ResendOtp']);

Route::post('change-forget-password', [App\Http\Controllers\Api\V1\AuthController::class, 'changeForgetPassword']);

// Categories
Route::post('categories', [App\Http\Controllers\Api\V1\HomeController::class, 'CategoriesList']);

// Brands List
Route::get('brands-list', [App\Http\Controllers\Api\V1\HomeController::class, 'BrandsList']);

// Country & State & City List
Route::get('country-list', [App\Http\Controllers\Api\V1\HomeController::class, 'CountryList']);
Route::get('state-list', [App\Http\Controllers\Api\V1\HomeController::class, 'StateList']);
Route::get('city-list', [App\Http\Controllers\Api\V1\HomeController::class, 'CityList']);

// All Products
Route::post('all-products', [App\Http\Controllers\Api\V1\HomeController::class, 'AllProducts']);
// Single Product
Route::get('single-product/{id}', [App\Http\Controllers\Api\V1\HomeController::class, 'singleProduct']);


// All Pages
Route::get('page', [App\Http\Controllers\Api\V1\HomeController::class, 'getPage']);

// Submit Contact
Route::post('submit-contact', [App\Http\Controllers\Api\V1\HomeController::class, 'submitContact']);

//login api
Route::post('login', [App\Http\Controllers\Api\V1\AuthController::class, 'login']);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {

    Route::post('change-password', [App\Http\Controllers\Api\V1\AuthController::class, 'ChangePassword']);
    
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Products
    // Route::apiResource('products', 'ProductApiController');
    Route::post('edit-product','ProductApiController@editProducts');
    Route::post('add-review','ProductApiController@addReview');
    Route::get('delete-product/{id}', 'ProductApiController@deleteProduct');

    // -- Attributes
    Route::post('products-attributes','ProductApiController@productAttributes');
    
    // Business
    Route::apiResource('business', 'BusinessApiController');
    Route::get('my-business', 'BusinessApiController@myBusiness');

    Route::get('legal-status', [App\Http\Controllers\Api\V1\HomeController::class, 'legalStatus']);
    
    Route::post('update-profile', [App\Http\Controllers\Api\V1\AuthController::class, 'updateProfile']);
    Route::get('get-user-data', [App\Http\Controllers\Api\V1\AuthController::class, 'getUserData']);

    Route::get('single-business-details/{business_id}', [App\Http\Controllers\Api\V1\HomeController::class, 'singleBusinessDetails']);


    // Reviews
    Route::post('add-review', [App\Http\Controllers\Api\V1\AuthController::class, 'addReview']);
});
