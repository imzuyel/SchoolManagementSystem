<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EmployeePaySalary;
use App\Models\Employeeattendance;
use App\Http\Controllers\Controller;

class EmployeePaySalaryController extends Controller
{

    public function index()
    {
        return view('backend.employee.paysalary.index');
    }

    public function getEmployee(Request $request)
    {

        if ($request->ajax()) {
            $where                  = array();
            if (isset($request->date)) {
                $date               = date('Y-m', strtotime($request->date));
                $where[]            = ['date', 'like', $date . '%'];
            }
            $employees              = Employeeattendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
            return view('backend.employee.paysalary.paysalaryajax', compact('employees', 'where'));
        }
    }


    public function MonthlySalaryPayslip(Request $request, $employee_id)
    {
        $id                         = Employeeattendance::where('employee_id', $employee_id)->first();
        $date                       = date('Y-m', strtotime($id->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data['details'] = Employeeattendance::with('user')->where($where)->where('employee_id', $id->employee_id)->first();

        $pdf = PDF::loadView('backend.employee.paysalary.pdf', $data);
        return $pdf->stream('document.pdf');
    }
}