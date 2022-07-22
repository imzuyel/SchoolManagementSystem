<?php

namespace App\Http\Controllers\backend;

use App\Models\Subject;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Assignsubject;
use App\Http\Controllers\Controller;

class AssignsubjectController extends Controller
{

    public function index()
    {
        $data['assingnsubjects'] = Assignsubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assignsubject.index', $data);
    }


    public function create()
    {
        $data['subjects']                       = Subject::where('status', true)->get();
        $data['classes']                        = StudentClass::where('status', true)->get();
        return view('backend.setup.assignsubject.form', $data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'subject_id'                        => 'required',
            'class_id'                          => 'required',
            'full_mark'                         => 'required',
            'full_mark.*'                       => 'required',
            'pass_mark'                         => 'required',
            'pass_mark.*'                       => 'required',
            'subjective_mark'                   => 'required',
            'subjective_mark.*'                 => 'required',
        ]);
        $countSubject = count($request->subject_id);
        if ($countSubject != NULL) {
            for ($i = 0; $i < $countSubject; $i++) {
                $assignsubject                  = new Assignsubject();
                $assignsubject->class_id        = $request->class_id;
                $assignsubject->subject_id      = $request->subject_id[$i];
                $assignsubject->full_mark       = $request->full_mark[$i];
                $assignsubject->pass_mark       = $request->pass_mark[$i];
                $assignsubject->subjective_mark = $request->subjective_mark[$i];
                $assignsubject->save();
            }
        }

        toastr('Assign subject added successfully', 'success');
        return redirect()->route('setup.assignsubject.index');
    }


    public function show($id)
    {
        $data['showdata'] = Assignsubject::where('class_id', $id)->orderBy('subject_id', 'asc')->get();
        return view('backend.setup.assignsubject.show', $data);
    }

    public function edit($id)
    {
        $data['editData']                       = Assignsubject::where('class_id', $id)->orderBy('subject_id', 'asc')->get();
        $data['subjects']                       = Subject::where('status', true)->get();
        $data['classes']                        = StudentClass::where('status', true)->get();
        return view('backend.setup.assignsubject.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subject_id'                        => 'required',
            'class_id'                          => 'required',
            'full_mark'                         => 'required',
            'full_mark.*'                       => 'required',
            'pass_mark'                         => 'required',
            'pass_mark.*'                       => 'required',
            'subjective_mark'                   => 'required',
            'subjective_mark.*'                 => 'required',
        ]);
        Assignsubject::where("class_id", $id)->delete();
        $countSubject = count($request->subject_id);
        if ($countSubject != NULL) {
            for ($i = 0; $i < $countSubject; $i++) {
                $assignsubject                   = new Assignsubject();
                $assignsubject->class_id         = $request->class_id;
                $assignsubject->subject_id       = $request->subject_id[$i];
                $assignsubject->full_mark        = $request->full_mark[$i];
                $assignsubject->pass_mark        = $request->pass_mark[$i];
                $assignsubject->subjective_mark  = $request->subjective_mark[$i];
                $assignsubject->save();
            }
        }
        toastr('Assign subject updated successfully', 'success');
        return redirect()->route('setup.assignsubject.index');
    }

    public function destroy($id)
    {
        //
    }
}