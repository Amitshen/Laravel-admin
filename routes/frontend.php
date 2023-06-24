<?php

Route::group(['namespace' => 'Frontend'], function () {

    // Single Page 
    Route::get('/' , function () {
        return view('frontend.component.index');
    });
    Route::get('about' , function () {
        return view('frontend.component.about');
    })->name('about');
    Route::get('/page/contact-us', 'HomeController@ContactUsPage')->name('contact-us');
    Route::post('/page/post-contact-us', 'HomeController@submitContactUsPage')->name('post-contact-us');
    Route::get('/page/{slug}', 'HomeController@SinglePage')->name('single-page');

});

