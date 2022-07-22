<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{


    public function index()
    {
        $data['designations'] = Designation::latest()->get();
        return view('backend.setup.designation.index', $data);
    }


    public function create()
    {
        return view('backend.setup.designation.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:designations,name'
        ]);
        Designation::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Designation added successfully', 'success');
        return redirect()->route('setup.designation.index');
    }


    public function edit(Designation $designation)
    {
        return view('backend.setup.designation.form', compact('designation'));
    }


    public function update(Request $request, Designation $designation)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:designations,name,' . $designation->id
        ]);
        $designation->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Designation updated successfully', 'info');
        return redirect()->route('setup.designation.index');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();
        toastr('Designation deleted successfully', 'success');
        return redirect()->route('setup.designation.index');
    }
}