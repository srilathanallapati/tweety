<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function (){
    Route::get('/tweets', 'TweetController@index')->name('tweets.index');
    Route::post('/tweets', 'TweetController@store')->name('tweets.create');
    Route::post('/profiles/{user:name}/follows', 'FollowsController@store')->name('follows');
    Route::get('/profiles/{user:name}', 'ProfilesController@show')->name('profile');
    Route::get('/profiles/{user:name}/edit','ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user:name}','ProfilesController@update')->middleware('can:edit,user');
    Route::get('/explore', 'ExploreController');
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');
});



