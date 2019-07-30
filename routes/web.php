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

Route::get('/event/{message}', function ($message) {
    event(new \App\Events\SayHelloEvent($message));

    dd('done');
    return view('welcome');
});
Route::get('/topics', 'TopicController@index');
Route::get('/topics/{topic}', 'TopicController@show');

Route::post('api/topics/{topic_id}/discussions', 'API\DiscussionController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
