<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Web')->group(function () {
    Route::get('/', 'FrontendController@index')->name('frontend.home');
    Route::get('/about', 'FrontendController@about')->name('frontend.about');
    Route::get('/under-construction', 'FrontendController@uncerConstruction')->name('frontend.under.construction');
    
    Route::prefix('notice')->group(function () {
        Route::get('/list', 'FrontendController@noticeList')->name('frontend.notice.list');
        Route::get('/show/{id}', 'FrontendController@showNotice')->name('frontend.notice.show');
    });
});