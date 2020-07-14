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
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/view', 'TagController@index')->name('tag.view');
        Route::get('/create', 'TagController@create')->name('tag.create');
        Route::post('/store', 'TagController@store')->name('tag.store');
        Route::get('/edit/{id}', 'TagController@edit')->name('tag.edit');
        Route::post('/update/{id}', 'TagController@update')->name('tag.update');
        Route::get('/delete/{id}', 'TagController@destroy')->name('tag.destroy');
    });
    Route::group(['prefix' => 'post'], function () {
        Route::get('/view', 'PostController@index')->name('post.view');
        Route::get('/create', 'PostController@create')->name('post.create');
        Route::post('/store', 'PostController@store')->name('post.store');
        Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
        Route::get('/show/{id}', 'PostController@show')->name('post.show');
        Route::post('/update/{id}', 'PostController@update')->name('post.update');
        Route::get('/delete/{id}', 'PostController@destroy')->name('post.destroy');
    });
});
