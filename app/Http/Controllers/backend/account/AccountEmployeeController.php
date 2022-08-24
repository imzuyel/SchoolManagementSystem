<?php

namespace App\Http\Controllers\backend\account;

use Illuminate\Http\Request;
use App\Models\Employeeattendance;
use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;

class AccountEmployeeController extends Controller
{

    public function index()
    {
        $data['employeesalaries'] = AccountEmployeeSalary::where('status', 1)->latest()->get();
        return view('backend.account.employeesalary.index', $data);
    }


    public function create()
    {
        return view('backend.account.employeesalary.form');
    }


    public function getEmployee(Request $request)
    {
        if ($request->ajax()) {
            $where                  = array();
            $date = date('Y-m', strtotime($request->date));
            if (isset($request->date)) {
                $date               = $date;
                $where[]            = ['date', 'like', $date . '%'];
            }
            $employees              = Employeeattendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
            return view('backend.account.employeesalary.addajax', compact('employees', 'where', 'date'));
        }
    }
    public function store(Request $request)
    {

        $date = date('Y-m', strtotime($request->date));

        AccountEmployeeSalary::where('date', $date)->delete();

        $employee = $request->employee_id;

        if ($employee != null) {
            for ($i = 0; $i < count($request->employee_id); $i++) {
                $data = new AccountEmployeeSalary();
                $pay_status = 'pay_status' . $i;
                $data->date = $date;
                $data->employee_id = $request->employee_id[$i];
                $data->amount = $request->amount[$i];
                if ($request->$pay_status === "pay") {
                    $data->status = 1;
                } else {
                    $data->status = 0;
                }
                $data->save();
            }
            noty("Salary Added saved", 'success');
            return to_route('account.employeesalary.index');
        }
    }
}
