<?php
Route::get('/users', [
    'as' => 'users.all',
    'uses' => 'DashboardController@getAllUser'
]);

Route::get('/user/delete/{id}', [
	'as' => 'user.delete',
	'uses' => 'DashboardController@getDeleteUser'
]);