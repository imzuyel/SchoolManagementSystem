<?php

namespace App\Http\Controllers\backend\mark;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index()
    {
        $data['grades'] = Grade::all();
        return view('backend.student.mark.grade.index', $data);
    }


    public function create()
    {
        return view('backend.student.mark.grade.form');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'grade_name'        => 'required|string',
            'grade_point'       => 'required',
            'start_marks'       => 'required',
            'end_marks'         => 'required',
            'start_point'       => 'required',
            'end_point'         => 'required',
            'remarks'           => 'required|string',
        ]);
        $grade                  = new Grade();
        $grade->grade_name      = $request->grade_name;
        $grade->grade_point     = $request->grade_point;
        $grade->start_marks     = $request->start_marks;
        $grade->end_marks       = $request->end_marks;
        $grade->start_point     = $request->start_point;
        $grade->end_point       = $request->end_point;
        $grade->remarks         = $request->remarks;
        $grade->save();

        noty('Grade save successfully', 'success');
        return to_route('mark.grade.index');
    }



    public function edit(Grade $grade)
    {

        return view('backend.student.mark.grade.form', compact('grade'));
    }


    public function update(Request $request, Grade $grade)
    {

        $this->validate($request, [
            'grade_name'        => 'required|string',
            'grade_point'       => 'required',
            'start_marks'       => 'required',
            'end_marks'         => 'required',
            'start_point'       => 'required',
            'end_point'         => 'required',
            'remarks'           => 'required|string',
        ]);

        $grade->grade_name  = $request->grade_name;
        $grade->grade_point = $request->grade_point;
        $grade->start_marks = $request->start_marks;
        $grade->end_marks   = $request->end_marks;
        $grade->start_point = $request->start_point;
        $grade->end_point   = $request->end_point;
        $grade->remarks     = $request->remarks;
        $grade->save();

        noty('Grade updated successfully', 'success');
        return to_route('mark.grade.index');
    }


    public function destroy(Grade $grade)
    {
        $grade->delete();

        noty('Grade deleted successfully', 'success');
        return to_route('mark.grade.index');
    }
}