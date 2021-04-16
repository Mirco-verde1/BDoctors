<?php

use Illuminate\Support\Facades\Auth;
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
    return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//doctor route
Route::get('/homepage', 'Admin\UserController@index');

Route::get('/advance', 'Admin\UserController@advance');



//guest route
Route::get('/test', 'Admin\UserController@index');

Route::get('/advance', 'Admin\UserController@advance');

