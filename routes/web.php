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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/ad/new', 'AdController@create')->name('ad.create')->middleware('auth');
Route::post('/ad/new', 'AdController@store')->name('ad.store')->middleware('auth');
Route::get('/ad/{id}', 'AdController@view')->name('ad.view');
Route::get('/profile', 'ProfileController@index')->name('profile.index')->middleware('auth');
Route::post('/profile', 'ProfileController@update')->name('profile.update')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
