<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CheckUsersController;
use App\Http\Controllers\BusinessDetailsController;
use App\Http\Controllers\UserDetaiController;
use App\Http\Controllers\EventController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');
Route::post('/postFamily',[FamilyController::class, 'store']);
Route::post('/businessForm', [BusinessDetailsController::class, 'store']);
Route::post('/userForm', [UserDetaiController::class, 'store']);
Route::get('/memberList', [BusinessDetailsController::class, 'index']);
Route::get('/business/{id}', 'BusinessDetailsController@show');
Route::get('/edit/{id}', 'BusinessDetailsController@update');
Route::put('/update/{id}', 'BusinessDetailsController@updateBus');
Route::get('/delete/{id}', 'BusinessDetailsController@destroy');
Route::get('allMember', 'UserDetaiController@index');
Route::post('/familySumbit', 'FamilyDetailsController@store');
Route::get('busin', 'UserDetaiController@allData');
Route::get('allMember', 'UserDetaiController@index');
Route::get('/family/{userId}', 'UserDetaiController@getFamilyDetails');
Route::get('/Details/{userId}', [UserDetaiController::class, 'getBusinessDetails']);
Route::get('/event', [EventController::class, 'index']);
Route::get('/eventForm', [EventController::class, 'store']);
Route::get('/eventList', [EventController::class, 'show']);








/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});
