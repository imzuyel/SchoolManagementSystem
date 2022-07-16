<?php

use App\Http\Controllers\backend\FeecategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\YearController;
use App\Http\Controllers\backend\GroupController;
use App\Http\Controllers\backend\ShiftController;
use App\Http\Controllers\backend\StudentClassController;

Route::get('/', function () {
    return view('backend.home');
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home');
    })->name('dashboard');
});

// User
Route::resource('/user', UserController::class);
Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profie');
Route::post('/user/profile/update', [UserController::class, 'userProfilrUpdate'])->name('user.profileupdate');
Route::post('/user/profile/password/update', [UserController::class, 'userProfilrPasswordUpdate'])->name('user.profilepasswordupdate');

Route::group(['prefix' => 'setup', 'as' => 'setup.'], function () {
    Route::resource('/class', StudentClassController::class);
    Route::resource('/year', YearController::class);
    Route::resource('/group', GroupController::class);
    Route::resource('/shift', ShiftController::class);
    Route::resource('/feecategory', FeecategoryController::class);
});