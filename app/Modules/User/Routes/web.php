<?php
Route::group([
    'middleware' => ['web', 'auth'],
    'prefix' => 'users',
    'namespace' => 'App\Modules\User\Controllers',
], function () {
    Route::get('/', 'UserController@index')->name('users');
    Route::get('/create/', 'UserController@create')->name('users.create');
    Route::post('/store/', 'UserController@store')->name('users.store');
    Route::get('/edit/{user}', 'UserController@edit')->name('users.edit');
    Route::put('/update/{user}', 'UserController@update')->name('users.update');
    Route::delete('/delete/{user}', 'UserController@delete')->name('users.delete');

    Route::get('/permissions', 'UserController@permissions')->name('users.permissions');
    Route::post('/permissions/save', 'UserController@savePermissions')->name('users.permissions.save');
});
