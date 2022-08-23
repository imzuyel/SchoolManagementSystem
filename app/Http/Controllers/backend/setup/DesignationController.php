<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        noty('Designation added successfully', 'success');
        return to_route('setup.designation.index');
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

        noty('Designation updated successfully', 'info');
        return to_route('setup.designation.index');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();
        noty('Designation deleted successfully', 'success');
        return to_route('setup.designation.index');
    }
}