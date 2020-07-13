<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('website.home');
});
Route::get('/about', function () {
    return view('website.about');
});
Route::get('/category', function () {
    return view('website.category');
});
Route::get('/post', function () {
    return view('website.post');
});

Route::get('/contact', function () {
    return view('website.contact');
});

//admin panel
Route::group(['middleware' => 'auth'], function () {
    Route::get('/view', 'HomeController@index')->name('dashboard');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/view', 'CategoryController@index')->name('category.view');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.destroy');

    });
});
