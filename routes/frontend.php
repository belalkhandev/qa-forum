<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Web\FrontendController@index')->name('fr.home');
Route::get('/under-construction', 'Web\FrontendController@underConstruction')->name('fr.uc');

//login-register
Route::get('signin', 'Web\Auth\LoginController@showLoginForm')->name('fr.login-account');
Route::post('signin', 'Web\Auth\LoginController@login')->name('fr.login');
Route::get('create-account', 'Web\Auth\RegisterController@showRegisterForm')->name('fr.create-account');
Route::post('create-account', 'Web\Auth\RegisterController@store')->name('fr.register');

Route::middleware(['auth'])->group(function () {

    Route::get('user-logout', 'Web\Auth\LoginController@logout')->name('fr.logout');

});
