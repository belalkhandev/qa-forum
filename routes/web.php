<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin-home', 'AdminController@index')->name('admin.home');

    Route::namespace('Web')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', 'DashboardController@index')->name('admin');
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

            //category
            Route::prefix('category')->group(function () {
                Route::get('/list', 'Admin\CategoryController@index')->name('category.list');
                Route::get('/create', 'Admin\CategoryController@create')->name('category.create');
                Route::post('/create', 'Admin\CategoryController@store')->name('category.store');
                Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
                Route::post('/edit/{id}', 'Admin\CategoryController@update')->name('category.update');
                Route::delete('/destroy/{id}', 'Admin\CategoryController@destroy')->name('category.destroy');
            });

            //Sub Cateogyr
            Route::prefix('sub-category')->group(function () {
                Route::get('/list', 'Admin\SubCategoryController@index')->name('sub-category.list');
                Route::get('/create', 'Admin\SubCategoryController@create')->name('sub-category.create');
                Route::post('/create', 'Admin\SubCategoryController@store')->name('sub-category.store');
                Route::get('/edit/{id}', 'Admin\SubCategoryController@edit')->name('sub-category.edit');
                Route::post('/edit/{id}', 'Admin\SubCategoryController@update')->name('sub-category.update');
                Route::delete('/destroy/{id}', 'Admin\SubCategoryController@destroy')->name('sub-category.destroy');
            });

            //slider manage
            Route::prefix('slider')->group(function () {
                Route::get('/list', 'Admin\SliderController@index')->name('slider.list');
                Route::get('/create', 'Admin\SliderController@create')->name('slider.create');
                Route::post('/create', 'Admin\SliderController@store')->name('slider.store');
                Route::get('/edit/{id}', 'Admin\SliderController@edit')->name('slider.edit');
                Route::post('/edit/{id}', 'Admin\SliderController@update')->name('slider.update');
                Route::delete('/destroy/{id}', 'Admin\SliderController@destroy')->name('slider.destroy');
            });

            //topic manage
            Route::prefix('topic')->group(function () {
                Route::get('/questions', 'Admin\TopicController@topicQuestion')->name('topic.question.list');
                Route::get('/questions/{question_id}/answers', 'Admin\TopicController@topicQuestionAnswer')->name('topic.question.answer');
                Route::get('/questions/{id}/show', 'Admin\TopicController@topicQuestionShow')->name('topic.question.show');
                Route::delete('/question/destroy/{id}', 'Admin\TopicController@destroyQuestion')->name('topic.question.destroy');
                Route::get('/answers', 'Admin\TopicController@topicAnswer')->name('topic.answer.list');
                Route::delete('/answer/destroy/{id}', 'Admin\TopicController@destroyAnswer')->name('topic.answer.destroy');
            });

            //slider manage
            Route::prefix('users')->group(function () {
                Route::get('/list', 'Admin\UserController@index')->name('user.list');
                Route::get('/new-registered', 'Admin\UserController@newRegistered')->name('users.new');
                Route::delete('/deactive/{id}', 'Admin\UserController@deActive')->name('user.deactive');
                Route::delete('/active/{id}', 'Admin\UserController@userActive')->name('user.active');
            });
            

        });

    });

});
