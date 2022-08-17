<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\RollController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\YearController;
use App\Http\Controllers\backend\GroupController;
use App\Http\Controllers\backend\ShiftController;
use App\Http\Controllers\backend\ExamfeeController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ExamtypeController;
use App\Http\Controllers\backend\FeeamountController;
use App\Http\Controllers\backend\MonthlyfeeController;
use App\Http\Controllers\backend\DesignationController;
use App\Http\Controllers\backend\FeecategoryController;
use App\Http\Controllers\backend\StudentClassController;
use App\Http\Controllers\backend\AssignsubjectController;
use App\Http\Controllers\backend\AssingstudentController;
use App\Http\Controllers\backend\EmployeeSalaryController;
use App\Http\Controllers\backend\RegistrationfeeController;

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
Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::resource('/assingstudent', AssingstudentController::class);
    Route::post('/assing/search', [AssingstudentController::class, 'search'])->name('assingstudent.search');

    // Promotion
    Route::get('/promotion/{id}', [AssingstudentController::class, 'promotion'])->name('assingstudent.promotion');
    Route::post('/promotion/new/{id}', [AssingstudentController::class, 'promotionNew'])->name('assingstudent.promotionNew');

    // Assing student pdf
    Route::get('/pdf/{id}', [AssingstudentController::class, 'pdf'])->name('assingstudent.pdf');

    // Roll generate
    Route::get('/roll/generate', [RollController::class, 'rollgenerate'])->name('rollgenerate');
    Route::post('/roll/generate/get', [RollController::class, 'rollgenerateHere']);
    Route::post('/roll/generate/store', [RollController::class, 'rollgenerateStore'])->name('rollstore');

    // Registration Fee
    Route::get('/registration/fee', [RegistrationfeeController::class, 'regfee'])->name('regFee');
    Route::post('/registration/fee', [RegistrationfeeController::class, 'regfeeget']);
    Route::get('/registration/fee/pdf/user-id/{user_id}/class-id/{class_id}', [RegistrationfeeController::class, 'regfeepdf'])->name('regfeepdf');

    // Registration Fee
    Route::get('/monthly/fee', [MonthlyfeeController::class, 'monthlyFee'])->name('monthlyFee');
    Route::post('/monthly/fee', [MonthlyfeeController::class, 'monthlyfeeget']);
    Route::get('/monthly/fee/pdf/user-id/{user_id}/class-id/{class_id}/month/{month}', [MonthlyfeeController::class, 'monthlyfeepdf'])->name('monthlyfeepdf');

    // Exam Fee
    Route::get('/exam/fee', [ExamfeeController::class, 'examFee'])->name('examFee');
    Route::post('/exam/fee', [ExamfeeController::class, 'examfeeget']);
    Route::get('/exam/fee/pdf/user-id/{user_id}/class-id/{class_id}/exam/{examtype}', [ExamfeeController::class, 'examfeepdf'])->name('examfeepdf');
});

Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::resource('/register', EmployeeController::class);
    Route::resource('/salary', EmployeeSalaryController::class);
});