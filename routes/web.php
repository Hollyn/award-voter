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

// Route::get('/', function () {
//     return view('welcome');
// });
// register
Route::get('register', 'Auth\RegisterController@register');
Route::post('register', 'Auth\RegisterController@store')->name('register');

// login
Route::get('login', 'Auth\LoginController@login');
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], '/', 'PagesController@index')->name('home');
    Route::get('/voted', 'PagesController@voted')->name('voted');
});
