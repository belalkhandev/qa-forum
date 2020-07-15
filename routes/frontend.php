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
    Route::get('change-password', 'Web\ProfileController@changePassword')->name('fr.change-password');
    Route::post('change-password', 'Web\ProfileController@updatePassword')->name('fr.update-password');

    Route::get('new-topic', 'Web\TopicController@newTopic')->name('fr.newTopic');
    Route::post('new-topic', 'Web\TopicController@storeNewTopic')->name('fr.newTopic.store');
    Route::post('topic-answer/{id}', 'Web\TopicController@topicAnswer')->name('fr.topic-answer');
    Route::get('edit-topic/{id}', 'Web\TopicController@editTopic')->name('fr.topic.edit');
    Route::post('edit-topic/{id}', 'Web\TopicController@updateTopic')->name('fr.topic.update');
    Route::delete('topic-question/destroy/{id}', 'Web\Admin\TopicController@destroyQuestion')->name('fr.topic.question.destroy');
    Route::delete('topic-answer/destroy/{id}', 'Web\Admin\TopicController@destroyAnswer')->name('fr.topic.answer.destroy');

    Route::post('find-sub-category', 'Web\FindController@getSubCategory')->name('find.subcategory');

    // notification loading
    Route::get('notifications', 'Web\NotificationController@index')->name('fr.notifications');
    Route::post('count-notification', 'Web\NotificationController@countNotification')->name('fr.notification.count');

    //profile update
    Route::get('profile/edit', 'Web\ProfileController@editProfile')->name('fr.profile.edit');
    Route::post('profile/edit', 'Web\ProfileController@update')->name('fr.profile.update');


});

Route::get('profile/{id}', 'Web\ProfileController@index')->name('fr.profile');

Route::post('get-notification', 'Web\NotificationController@getNotification')->name('fr.get.notification');

Route::get('topic-show/{id}', 'Web\TopicController@show')->name('fr.topic.show');
Route::get('topics/category/{id}', 'Web\TopicController@categoryTopic')->name('fr.topic.category');
Route::get('search-topic', 'Web\TopicController@searchTopic')->name('fr.search.topic');
    
// topic vote
Route::post('/topic-vote', 'Web\VoteController@topicVote')->name('fr.topic-vote');

// answer vote
Route::post('/answer-vote', 'Web\VoteController@answerVote')->name('fr.answer-vote');

Route::post('search-category', 'Web\FindController@searchCategory')->name('fr.search.match');

