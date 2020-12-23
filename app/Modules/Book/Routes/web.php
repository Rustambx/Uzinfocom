<?php
Route::group([
    'middleware' => ['web', 'auth'],
    'prefix' => 'books',
    'namespace' => 'App\Modules\Book\Controllers',
], function () {
    Route::get('/', 'BookController@index')->name('books');
    Route::get('/show/{book}', 'BookController@show')->name('books.show');
    Route::get('/create/', 'BookController@create')->name('books.create');
    Route::post('/store/', 'BookController@store')->name('books.store');
    Route::get('/edit/{book}', 'BookController@edit')->name('books.edit');
    Route::put('/update/{book}', 'BookController@update')->name('books.update');
    Route::delete('/delete/{book}', 'BookController@delete')->name('books.delete');
});
