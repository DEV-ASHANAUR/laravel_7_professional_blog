<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home','HomeController@index')->name('home');


// Route::get('/', function () {
//     return view('website.home');
// })->name('home.view');
// Route::get('/about', 'FrontEndController@about')->name('about');
// Route::get('/category', function () {
//     return view('website.category');
// });
// Route::get('/post', function () {
//     return view('website.post');
// });

// Route::get('/contact', function () {
//     return view('website.contact');
// });

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
    Route::group(['prefix' => 'user'], function () {
        Route::get('/view', 'UserController@view_user')->name('user.view');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/update/{id}', 'UserController@update')->name('user.update');
        Route::get('/delete/{id}', 'UserController@destroy')->name('user.destroy');
        Route::get('/pass/view', 'UserController@passview')->name('profile.pass.view');
        Route::post('/pass/change', 'UserController@passchange')->name('profile.pass.change');
        Route::get('/profile/view', 'UserController@view_profile')->name('profile.view');
        Route::get('/profile/edit', 'UserController@edit_profile')->name('profile.edit');
        Route::post('/profile/update', 'UserController@update_profile')->name('profile.update');
    });
    Route::group(['prefix' => 'post'], function () {
        Route::get('/post_view', 'PostController@index')->name('post.view');
        Route::get('/create', 'PostController@create')->name('post.create');
        Route::post('/store', 'PostController@store')->name('post.store');
        Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
        Route::get('/show/{id}', 'PostController@show')->name('post.show');
        Route::post('/update/{id}', 'PostController@update')->name('post.update');
        Route::get('/delete/{id}', 'PostController@destroy')->name('post.destroy');
    });
});

Route::get('/','FrontEndController@home')->name('website.home');
Route::get('/about','FrontEndController@about')->name('website.about');
Route::get('/post/{slug}','FrontEndController@singlepost')->name('website.post');
Route::get('/category','FrontEndController@category')->name('website.category');
Route::get('/contact','FrontEndController@contact')->name('website.contact');
