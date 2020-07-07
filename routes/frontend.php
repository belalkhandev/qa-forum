<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Web')->group(function () {
    Route::get('/', 'FrontendController@index')->name('fr.home');
    Route::get('/under-construction', 'FrontendController@uncerConstruction')->name('frontend.under.construction');
    
});