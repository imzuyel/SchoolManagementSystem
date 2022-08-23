<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\Examtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamtypeController extends Controller
{

    public function index()
    {
        $data['examtypes'] = Examtype::latest()->get();
        return view('backend.setup.examtype.index', $data);
    }


    public function create()
    {
        return view('backend.setup.examtype.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:examtypes,name'
        ]);
        Examtype::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        noty('Exam type added successfully', 'success');
        return to_route('setup.examtype.index');
    }



    public function edit(Examtype $examtype)
    {
        $examtype = Examtype::findOrFail($examtype);
        return view('backend.setup.examtype.form', compact('examtype'));
    }

    public function update(Request $request, Examtype $examtype)
    {

        $this->validate($request, [
            'name'                  => 'required|string|unique:examtypes,name,' . $examtype->id
        ]);
        $examtype->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        noty('Exam type updated successfully', 'success');
        return to_route('setup.examtype.index');
    }


    public function destroy(Examtype $examtype)
    {
        $examtype->delete();
        noty('Exam-type deleted successfully', 'success');
        return to_route('setup.examtype.index');
    }
}