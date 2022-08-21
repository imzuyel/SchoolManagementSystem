<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\LeavePurpose;
use Illuminate\Http\Request;

class LeavePruposeController extends Controller
{

    public function index()
    {
        $data['leavepurposes'] = LeavePurpose::latest()->get();
        return view('backend.employee.leavepurpose.index', $data);
    }


    public function create()
    {
        return view('backend.employee.leavepurpose.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:leave_purposes,name'
        ]);
        LeavePurpose::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        noty('Leave purpose added successfully', 'success');
        return to_route('employee.leavepurpose.index');
    }



    public function edit($id)
    {
        $leavePurpose = LeavePurpose::findOrFail($id);
        return view('backend.employee.leavepurpose.form', compact('leavePurpose'));
    }

    public function update(Request $request, $id)
    {
        $leavePurpose = LeavePurpose::findOrFail($id);
        $this->validate($request, [
            'name'                  => 'required|string|unique:leave_purposes,name,' . $leavePurpose->id,
        ]);
        $leavePurpose->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        noty('Leave purpose added successfully', 'success');
        return to_route('employee.leavepurpose.index');
    }


    public function destroy($id)
    {
        $leavePurpose = LeavePurpose::findOrFail($id);
        $leavePurpose->delete();
        noty('Leave Purpose deleted successfully', 'success');
        return to_route('employee.leavepurpose.index');
    }
}