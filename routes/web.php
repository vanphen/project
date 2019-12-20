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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'PostController@list')->name('home');

Route::get('posts/detail/{postid}', 'PostController@detail')->name('detail');;

Route::get('posts/create', 'PostController@create')->name('create')->middleware('check');

Route::post('posts/create', 'PostController@insert')->middleware('check');

Route::post('posts/edit/{id}', 'PostController@editPost')->middleware('check');

Route::get('posts/edit/{id}', 'PostController@edit')->name('edit')->middleware('check');

Route::get('posts/delete/{id}', 'PostController@delete')->middleware('check');

Route::post('posts/addcomment/{id}', 'PostController@addcomment');

Route::get('posts/login', 'Logincontroller@login')->name('login');

Route::post('posts/login', 'Logincontroller@loginPost');

Route::get('posts/logout', 'Logincontroller@logOut')->name('logout');
