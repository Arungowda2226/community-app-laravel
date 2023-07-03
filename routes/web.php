<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CheckUsersController;
use App\Http\Controllers\BusinessDetailsController;
use App\Http\Controllers\UserDetaiController;

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
// Route::get('/memberList', [BusinessDetailsController::class, 'index']);
Route::get('/memberList', [BusinessDetailsController::class, 'index']);
// Route::get('/business/{id}', [BusinessDetailsController::class, 'show']);
Route::get('/business/{id}', 'BusinessDetailsController@show');


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