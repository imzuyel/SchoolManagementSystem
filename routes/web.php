<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\YearController;
use App\Http\Controllers\backend\GroupController;
use App\Http\Controllers\backend\ShiftController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\ExamtypeController;
use App\Http\Controllers\backend\FeeamountController;
use App\Http\Controllers\backend\DesignationController;
use App\Http\Controllers\backend\FeecategoryController;
use App\Http\Controllers\backend\StudentClassController;
use App\Http\Controllers\backend\AssignsubjectController;

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
    Route::resource('/feeamount', FeeamountController::class);
    Route::resource('/examtype', ExamtypeController::class);
    Route::resource('/subject', SubjectController::class);
    Route::resource('/assignsubject', AssignsubjectController::class);
    Route::resource('/designation', DesignationController::class);
});