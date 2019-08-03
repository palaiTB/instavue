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

Auth::routes();

Route::get('/email' , function(){
   return new \App\Mail\NewUserWelcomeMail();

});

Route::get('/home', 'PostsController@index');

Route::get('/p/create', 'PostsController@create');

Route::get('/profile/{user}', 'ProfilesController@index')->name('home');

Route::post('/p', 'PostsController@store');

Route::get('/p/{post}', 'PostsController@show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit');

Route::patch('/profile/{user}', 'ProfilesController@update');

Route::post('/follow/{user}', 'FollowsController@store');
