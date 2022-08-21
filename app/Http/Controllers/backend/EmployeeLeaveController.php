<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\LeavePurpose;
use Illuminate\Http\Request;
use App\Models\EmployeeLeave;
use App\Http\Controllers\Controller;

class EmployeeLeaveController extends Controller
{

    public function index()
    {
        $data['leaves']                     = EmployeeLeave::latest()->get();
        return view('backend.employee.leave.index', $data);
    }


    public function create()
    {
        $data['employees']                  = User::where('user_type', 'Employee')->latest()->get();
        $data['leavepurposes']              = LeavePurpose::where('status', 1)->latest()->get();
        return view('backend.employee.leave.form', $data);
    }


    public function store(Request $request)
    {


        $this->validate($request, [
            'employee_id'                   => 'required',
            'start_date'                    => 'required',
            'end_date'                      => 'required',
            'employee_id'                   => 'required',
            'leave_purpose_id'              => 'required',
        ]);

        if ($request->leave_purpose_id == "0") {
            $check                          = LeavePurpose::where('name', $request->name)->get();
            if (count($check) > 0) {
                noty('Duplicate is purpose save', 'error');
                return redirect()->back();
            } else {
                $leavepurpose               = new LeavePurpose();
                $leavepurpose->name         = $request->name;
                $leavepurpose->status       = 1;
                $leavepurpose->save();
                $leave_purpose_id           = $leavepurpose->id;
            }
        } else {
            $leave_purpose_id               = $request->leave_purpose_id;
        }

        $data                               = new EmployeeLeave();
        $data->employee_id                  = $request->employee_id;
        $data->leave_purpose_id             = $leave_purpose_id;
        $data->start_date                   = date('Y-m-d', strtotime($request->start_date));
        $data->end_date                     = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        noty('Employee leave added successfully', 'success');
        return to_route('employee.leave.index');
    }



    public function edit($id)
    {
        $data['leave']                      = EmployeeLeave::find($id);
        $data['employees']                  = User::where('user_type', 'Employee')->latest()->get();
        $data['leavepurposes']              = LeavePurpose::where('status', 1)->latest()->get();
        return view('backend.employee.leave.form', $data);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'employee_id'                   => 'required',
            'start_date'                    => 'required',
            'end_date'                      => 'required',
            'employee_id'                   => 'required',
            'leave_purpose_id'              => 'required',
        ]);

        if ($request->leave_purpose_id == "0") {
            $check                          = LeavePurpose::where('name', $request->name)->get();
            if (count($check) > 1) {
                noty('Duplicate is purpose save', 'error');
                return redirect()->back();
            } else {
                $leavepurpose               = new LeavePurpose();
                $leavepurpose->name         = $request->name;
                $leavepurpose->status       = 1;
                $leavepurpose->save();
                $leave_purpose_id           = $leavepurpose->id;
            }
        } else {
            $leave_purpose_id               = $request->leave_purpose_id;
        }

        $data                               = EmployeeLeave::find($id);
        $data->employee_id                  = $request->employee_id;
        $data->leave_purpose_id             = $leave_purpose_id;
        $data->start_date                   = date('Y-m-d', strtotime($request->start_date));
        $data->end_date                     = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        noty('Employee leave updated successfully', 'success');
        return to_route('employee.leave.index');
    }


    public function destroy($id)
    {
        $leave = EmployeeLeave::find($id);
        $leave->delete();

        noty('Employee leave deleted successfully', 'success');
        return to_route('employee.leave.index');
    }
}