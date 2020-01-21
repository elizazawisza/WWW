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
    return view('home');
});


//COOKIES

Route::post('/acceptCookie', 'HomeController@cookiesPolicy')->name('createCookie');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//MATH

Route::get('/part1', 'MathViewsController@part1')->name('mathPart1');
Route::get('/part2', 'MathViewsController@part2')->name('mathPart2');

//Comments
Route::post('/comment', 'CommentController@store')->name('addComment');
Route::get('/getComments', 'CommentController@getCommentsToSection')->name('getComments');


//IP
Route::post('/storeIP', 'IpController@store')->name('addIP');
Route::get('/visitors', 'IpController@getVisitorsAmount')->name('visitors');

