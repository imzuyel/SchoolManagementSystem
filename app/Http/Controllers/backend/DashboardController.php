<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Year;
use App\Models\Group;
use App\Models\Shift;
use App\Models\Examtype;
use App\Models\StudentClass;
use App\Models\Employeeattendance;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $data['total_class'] = StudentClass::all()->count();
        $data['batch'] = Year::all()->count();
        $data['group'] = Group::all()->count();
        $data['shift'] = Shift::all()->count();
        $data['examtype'] = Examtype::all()->count();
        $data['total_employee'] = User::where('user_type', 'Employee')->count();
        $data['total_student'] = User::where('user_type', 'Student')->count();
        $data['total_employee'] = User::where('user_type', 'Employee')->count();
        $data['year']            = Year::latest()->first();
        $data['classes'] = StudentClass::all();
        $data['employeeattendances']          = Employeeattendance::select('date')->groupBy('date')->latest()->take(12)->get();
        $data['employess'] = User::where('user_type', 'Employee')->get();

        return view('backend.home', $data);
    }
}