<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Employeeattendance;
use App\Http\Controllers\Controller;

class EmployeeattendanceController extends Controller
{

    public function index()
    {
        $data['employeeattendances']          = Employeeattendance::select('date')->groupBy('date')->latest()->get();
        return view('backend.employee.attendance.index', $data);
    }


    public function create()
    {
        $data['employees']                      = User::where('user_type', 'Employee')->latest()->get();
        return view('backend.employee.attendance.form', $data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
        ]);

        $countemployee                          = count($request->employee_id);
        for ($i = 0; $i < $countemployee; $i++) {
            $attend_status                      = 'attend_status' . $i;
            $attend                             = new Employeeattendance();
            $attend->date                       = date('Y-m-d', strtotime($request->date));
            $attend->employee_id                = $request->employee_id[$i];
            $attend->attend_status              = $request->$attend_status;
            $attend->save();
        }
        toastr('Attendance save successfully', 'success');
        return to_route('employee.attendance.index');
    }


    public function show($date)
    {
        $data['employeeattendances']             =  Employeeattendance::where('date', date('Y-m-d', strtotime($date)))->get();
        return view('backend.employee.attendance.details', $data);
    }


    public function edit($date)
    {
        $data['employeeattendance']             =  Employeeattendance::where('date', date('Y-m-d', strtotime($date)))->get();
        return view('backend.employee.attendance.form', $data);
    }


    public function update(Request $request, $date)
    {
        $this->validate($request, [
            'date' => 'required',
        ]);
        Employeeattendance::where('date', date('Y-m-d', strtotime($date)))->delete();
        $countemployee                          = count($request->employee_id);
        for ($i = 0; $i < $countemployee; $i++) {
            $attend_status                      = 'attend_status' . $i;
            $attend                             = new Employeeattendance();
            $attend->date                       = date('Y-m-d', strtotime($request->date));
            $attend->employee_id                = $request->employee_id[$i];
            $attend->attend_status              = $request->$attend_status;
            $attend->save();
        }
        toastr('Attendance updated successfully', 'success');
        return to_route('employee.attendance.index');
    }


    public function destroy($id)
    {
        //
    }
}