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

/**
 * All routes related to ads
 */
Route::prefix('ad')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('new', 'AdController@create')->name('ad.create');
        Route::post('new', 'AdController@store')->name('ad.store');
        Route::get('saved', 'AdController@remembered')->name('ad.remembered');
        Route::post('remember/{id}', 'AdController@remember')->name('ad.remember');
        Route::post('forget/{id}', 'AdController@forget')->name('ad.forget');
    });
    Route::get('{id}', 'AdController@view')->name('ad.view');
});

/**
 * All routes related to profile
 */
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::post('/', 'ProfileController@update')->name('profile.update');
    Route::get('{id}', 'ProfileController@view')->name('profile.view');
});

Auth::routes();
