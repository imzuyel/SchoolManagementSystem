<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index()
    {
        $data['subjects'] = Subject::latest()->get();
        return view('backend.setup.subject.index', $data);
    }


    public function create()
    {
        return view('backend.setup.subject.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:subjects,name'
        ]);
        Subject::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        noty('School subject added successfully', 'success');
        return to_route('setup.subject.index');
    }



    public function edit(Subject $subject)
    {
        return view('backend.setup.subject.form', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {

        $this->validate($request, [
            'name'                  => 'required|string|unique:subjects,name,' . $subject->id
        ]);
        $subject->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        noty('School subject updated successfully', 'success');
        return to_route('setup.subject.index');
    }


    public function destroy(Subject $subject)
    {
        $subject->delete();
        noty('School subject deleted successfully', 'success');
        return to_route('setup.subject.index');
    }
}