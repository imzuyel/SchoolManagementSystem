<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use App\Http\Controllers\Controller;


class EmployeeSalaryController extends Controller
{

    public function index()
    {
        $data['employees']              = User::where('user_type', 'Employee')->latest()->get();
        return view('backend.employee.salary.index', $data);
    }


    public function edit($id)
    {
        $data['employee']               = User::findOrFail($id);
        return view('backend.employee.salary.form', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'increment_salary'          => 'required|numeric|integer',
            'effected_salary'           => 'required|date',
        ]);
        $user                           = User::findOrFail($id);
        $previous_salary                = $user->salary;
        $present_salary                 = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary                   = $present_salary;
        $user->save();

        $salaryData                     = new EmployeeSalary();
        $salaryData->employee_id        = $id;
        $salaryData->previous_salary    = $previous_salary;
        $salaryData->increment_salary   = $request->increment_salary;
        $salaryData->present_salary     = $present_salary;
        $salaryData->effected_salary    = date('Y-m-d', strtotime($request->effected_salary));
        $salaryData->save();

        noty('Salary Increment', 'success');

        return to_route('employee.salary.index');
    }

    public function show($id)
    {
        $data['employee']               = User::find($id);
        $data['salaries']             = EmployeeSalary::where('employee_id', $data['employee']->id)->get();
        return view('backend.employee.salary.details', $data);
    }
}