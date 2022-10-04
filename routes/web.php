<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\mark\GradeController;
use App\Http\Controllers\backend\setup\YearController;
use App\Http\Controllers\backend\setup\GroupController;
use App\Http\Controllers\backend\setup\ShiftController;
use App\Http\Controllers\backend\student\RollController;
use App\Http\Controllers\backend\setup\SubjectController;
use App\Http\Controllers\backend\mark\MarkentryController;
use App\Http\Controllers\backend\report\ProfiteController;
use App\Http\Controllers\backend\setup\ExamtypeController;
use App\Http\Controllers\backend\setup\FeeamountController;
use App\Http\Controllers\backend\student\ExamfeeController;
use App\Http\Controllers\backend\account\OthercostController;
use App\Http\Controllers\backend\employee\EmployeeController;
use App\Http\Controllers\backend\setup\DesignationController;
use App\Http\Controllers\backend\setup\FeecategoryController;
use App\Http\Controllers\backend\account\StudentFeeController;
use App\Http\Controllers\backend\setup\StudentClassController;
use App\Http\Controllers\backend\student\MonthlyfeeController;
use App\Http\Controllers\backend\setup\AssignsubjectController;
use App\Http\Controllers\backend\employee\LeavePruposeController;
use App\Http\Controllers\backend\student\AssingstudentController;
use App\Http\Controllers\backend\employee\EmployeeLeaveController;
use App\Http\Controllers\backend\account\AccountEmployeeController;
use App\Http\Controllers\backend\employee\EmployeeSalaryController;
use App\Http\Controllers\backend\student\RegistrationfeeController;
use App\Http\Controllers\backend\employee\EmployeePaySalaryController;
use App\Http\Controllers\backend\employee\EmployeeattendanceController;



Route::get('/', function () {
    return view('frontend.home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'AdminCheck::class'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User
    Route::resource('/user', UserController::class);
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profie');
    Route::post('/user/profile/update', [UserController::class, 'userProfilrUpdate'])->name('user.profileupdate');
    Route::post('/user/profile/password/update', [UserController::class, 'userProfilrPasswordUpdate'])->name('user.profilepasswordupdate');

    Route::group(['prefix' => 'setup', 'as' => 'setup.'], function () {
        Route::resource('/class', StudentClassController::class)->except('show');
        Route::resource('/year', YearController::class)->except('show');
        Route::resource('/group', GroupController::class)->except('show');
        Route::resource('/shift', ShiftController::class)->except('show');
        Route::resource('/feecategory', FeecategoryController::class)->except('show');
        Route::resource('/feeamount', FeeamountController::class);
        Route::resource('/examtype', ExamtypeController::class)->except('show');
        Route::resource('/subject', SubjectController::class)->except('show');
        Route::resource('/assignsubject', AssignsubjectController::class);
        Route::resource('/designation', DesignationController::class)->except('show');
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
        Route::resource('/leavepurpose', LeavePruposeController::class);
        Route::resource('/leave', EmployeeLeaveController::class);
        Route::resource('/attendance', EmployeeattendanceController::class);

        // Employee Pay Salary
        Route::resource('/paysalary', EmployeePaySalaryController::class)->only('index');
        Route::post('/monthly/salary/pay', [EmployeePaySalaryController::class, 'getEmployee']);
        Route::get('/monthly/salary/payslip/{employee_id}', [EmployeePaySalaryController::class, 'MonthlySalaryPayslip'])->name('monthly.salary.payslip');
    });

    Route::group(['prefix' => 'mark', 'as' => 'mark.'], function () {
        // Mark entry
        Route::get('/entry', [MarkentryController::class, 'index'])->name('entry.index');
        Route::post('/entry/get/class', [MarkentryController::class, 'getClass']);
        Route::post('/entry/student/get', [MarkentryController::class, 'markgenerateHere']);
        Route::post('/entry/student/mark/store', [MarkentryController::class, 'update'])->name('entry.store');
        Route::get('/entry/student/edit/get', [MarkentryController::class, 'editMark'])->name('entry.editMark');
        Route::post('/entry/student/get/edit', [MarkentryController::class, 'markeditHere']);
        Route::post('/entry/student/mark/update', [MarkentryController::class, 'update'])->name('entry.update');

        // Grade
        Route::resource('/grade', GradeController::class)->except('show');
    });

    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::resource('/studentfee', StudentFeeController::class)->only('index', 'create', 'store');
        Route::post('/studentfee/get', [StudentFeeController::class, 'getData']);

        Route::resource('/employeesalary', AccountEmployeeController::class)->only('index', 'create', 'store');
        Route::post('/employee/salary/get', [AccountEmployeeController::class, 'getEmployee']);

        Route::resource('/othercost', OthercostController::class)->except('show');
    });
    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('/profite', [ProfiteController::class, 'index'])->name('profite.index');
        Route::post('/profite/get', [ProfiteController::class, 'profiteGet']);
        Route::get('/profite/pdf/{start_date}/{end_date}', [ProfiteController::class, 'profitePdf'])->name('profite.pdf');
    });
});