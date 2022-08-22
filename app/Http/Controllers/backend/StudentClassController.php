<?php

namespace App\Http\Controllers\backend;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{

    public function index()
    {
        $data['classes'] = StudentClass::latest()->get();
        return view('backend.setup.class.index', $data);
    }


    public function create()
    {
        return view('backend.setup.class.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:student_classes'
        ]);
        StudentClass::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        noty('Class added successfully', 'success');
        return to_route('setup.class.index');
    }


    public function edit($id)
    {
        $class = StudentClass::findOrFail($id);
        return view('backend.setup.class.form', compact('class'));
    }


    public function update(Request $request, $id)
    {
        $class = StudentClass::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|unique:student_classes,name,' . $class->id
        ]);
        $class->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        flash('Data has been updated successfully!', 'success');
        return to_route('setup.class.index');
    }

    public function destroy($id)
    {
        $class = StudentClass::findOrFail($id);
        $class->delete();
        noty('Class deleted successfully', 'error');
        return to_route('setup.class.index');
    }
}