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
        Route::post('{id}/delete', 'AdController@destroy')->name('ad.delete');
        Route::get('saved', 'AdController@remembered')->name('ad.remembered');
        Route::get('my-ads', 'AdController@myAds')->name('ad.my');
        Route::post('remember/{id}', 'AdController@remember')->name('ad.remember');
        Route::post('forget/{id}', 'AdController@forget')->name('ad.forget');
        Route::get('{id}/chat', 'ChatController@view')->name('chat.view');
        Route::post('{id}/chat', 'ChatController@storeMessage')->name('message.store');
        Route::get('{id}/deliver', 'WorkController@deliver')->name('work.deliver');
        Route::get('{id}/view-delivery', 'WorkController@viewDelivery')->name('work.viewDelivery');
        Route::post('{id}/deliver', 'WorkController@store')->name('work.store');
        Route::post('{id}/rate', 'WorkController@storeRating')->name('work.rate');
    });

    /**
     * All routes related to bids
     */
    Route::prefix('bid')->middleware('auth')->group(function () {
        Route::post('new', 'BidController@store')->name('ad.bid.store');
        Route::post('delete', 'BidController@destroy')->name('ad.bid.destroy');
        Route::post('hire', 'BidController@hire')->name('ad.bid.hire');
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
    Route::post('{id}/review', 'ProfileController@storeReview')->name('review.store');
});
Route::get('discover', 'ProfileController@discover')->name('profile.discover');

/**
 * All routes related to cv
 */
Route::prefix('cv')->middleware('auth')->group(function () {
    Route::get('/', 'CvController@index')->name('cv.index');
    Route::get('view/{id}', 'CvController@view')->name('cv.view');
    Route::get('new', 'CvController@create')->name('cv.create');
    Route::post('new', 'CvController@store')->name('cv.store');
    Route::get('{id}/edit', 'CvController@edit')->name('cv.edit');
    Route::post('{id}/edit', 'CvController@update')->name('cv.update');
    Route::post('{id}/delete', 'CvController@destroy')->name('cv.destroy');

    /**
     * All routes related to education
     */
    Route::prefix('{id}/education')->middleware('auth')->group(function () {
        Route::get('new', 'EducationController@create')->name('cv.education.new');
        Route::post('new', 'EducationController@store')->name('cv.education.store');
        Route::post('edit/{educationId}', 'EducationController@update')->name('cv.education.update');
        Route::post('{educationId}/destroy', 'EducationController@destroy')->name('cv.education.destroy');
    });

    /**
     * All routes related to job experience
     */
    Route::prefix('{id}/experience')->middleware('auth')->group(function () {
        Route::get('new', 'ExperienceController@create')->name('cv.experience.new');
        Route::post('new', 'ExperienceController@store')->name('cv.experience.store');
        Route::post('edit/{experienceId}', 'ExperienceController@update')->name('cv.experience.update');
        Route::post('{experienceId}/destroy', 'ExperienceController@destroy')->name('cv.experience.destroy');
    });
});

/**
 * All routes related to work
 */
Route::prefix('work')->middleware('auth')->group(function () {
    Route::get('/', 'WorkController@index')->name('work.index');
    Route::get('{id}', 'WorkController@view')->name('work.view');
});

Auth::routes();
