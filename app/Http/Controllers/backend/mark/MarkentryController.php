<?php

namespace App\Http\Controllers\backend\mark;

use App\Models\Year;
use App\Models\Examtype;
use App\Models\Markentry;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Assignsubject;
use App\Models\Assingstudent;
use App\Http\Controllers\Controller;

class MarkentryController extends Controller
{

    public function index()
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::where('status', true)->get();
        $data['examtypes']                  = Examtype::latest()->where('status', true)->get();
        $data['class_id']                   = StudentClass::orderBy('id', 'asc')->first()->id;
        $data['subjects'] = Assignsubject::with('get_subject')->where('class_id', $data['class_id'])->get();
        return view('backend.student.mark.index', $data);
    }



    public function getClass(Request $request)
    {
        if ($request->ajax()) {
            $data['subjects']               = Assignsubject::with('get_subject')->where('class_id', $request->class_id)->get();
            return view('backend.student.mark.classappend', $data);
        }
    }
    public function markgenerateHere(Request $request)
    {

        if ($request->ajax()) {
            $data['year_id']                = $request->year_id;
            $data['class_id']               = $request->class_id;
            $data['assignsubject_id']       = $request->assignsubject_id;
            $data['examtype_id']            = $request->examtype_id;
            $data['students']               = Assingstudent::where(['year_id' => $request->year_id, 'class_id' => $request->class_id])->latest()->get();
            return view('backend.student.mark.markajax', $data);
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'year_id'                       => 'required',
            'assignsubject_id'              => 'required',
            'class_id'                      => 'required',
            'examtype_id'                   => 'required',
            'mark'                          => 'array',
            'student_id.*'                  => 'integer',
            'mark.*'                        => 'nullable|integer',

        ]);
        $data['year_id']                    = $request->year_id;
        $data['class_id']                   = $request->class_id;

        Markentry::where(['year_id' => $request->year_id, 'class_id' => $request->class_id, 'assignsubject_id' => $request->assignsubject_id, 'examtype_id' => $request->examtype_id])->delete();
        if ($request->student_id != NULL) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                $mark = new  Markentry();
                $mark->student_id       = $request->student_id[$i];
                $mark->mark             = $request->mark[$i];
                $mark->year_id          = $request->year_id;
                $mark->class_id         = $request->class_id;
                $mark->assignsubject_id = $request->assignsubject_id;
                $mark->examtype_id      = $request->examtype_id;
                $mark->save();
            }
        }
        noty('Mark added successfully', 'success');
        return to_route('mark.entry.index');
    }




    public function editMark()
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::where('status', true)->get();
        $data['examtypes']                  = Examtype::latest()->where('status', true)->get();
        $data['class_id']                   = StudentClass::orderBy('id', 'asc')->first()->id;
        $data['subjects']                   = Assignsubject::with('get_subject')->where('class_id', $data['class_id'])->get();
        return view('backend.student.mark.edit', $data);
    }

    public function markeditHere(Request $request)
    {

        if ($request->ajax()) {
            $data['year_id']                = $request->year_id;
            $data['class_id']               = $request->class_id;
            $data['assignsubject_id']       = $request->assignsubject_id;
            $data['examtype_id']            = $request->examtype_id;
            $data['students']               = Markentry::where([
                'year_id'           => $request->year_id,
                'class_id'          => $request->class_id,
                'assignsubject_id'  => $request->assignsubject_id,
                'examtype_id' => $request->examtype_id
            ])->latest()->get();
            return view('backend.student.mark.editmarkajax', $data);
        }
    }




    public function update(Request $request)
    {
        $this->validate($request, [
            'year_id'                       => 'required',
            'assignsubject_id'              => 'required',
            'class_id'                      => 'required',
            'examtype_id'                   => 'required',
            'mark'                          => 'array',
            'student_id.*'                  => 'integer',
            'mark.*'                        => 'nullable|integer',

        ]);
        $data['year_id']                    = $request->year_id;
        $data['class_id']                   = $request->class_id;
        Markentry::where([
            'year_id'           => $request->year_id,
            'class_id'          => $request->class_id,
            'assignsubject_id'  => $request->assignsubject_id,
            'examtype_id' => $request->examtype_id
        ])->delete();

        if ($request->student_id != NULL) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                $mark = new  Markentry();
                $mark->student_id       = $request->student_id[$i];
                $mark->mark             = $request->mark[$i];
                $mark->year_id          = $request->year_id;
                $mark->class_id         = $request->class_id;
                $mark->assignsubject_id = $request->assignsubject_id;
                $mark->examtype_id      = $request->examtype_id;
                $mark->save();
            }
        }
        noty('Mark updated successfully', 'info');
        return to_route('mark.entry.index');
    }
}