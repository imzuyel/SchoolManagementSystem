<?php

namespace App\Http\Controllers\backend;

use App\Models\Year;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Assingstudent;
use App\Http\Controllers\Controller;

class RollController extends Controller
{
    public  function rollgenerate()
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['year_id']                    = Year::orderBy('id', 'desc')->first()->id;
        $data['class_id']                   = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['students']                   = Assingstudent::where(['year_id' => $data['year_id'], 'class_id' => $data['class_id']])->latest()->get();

        return view('backend.student.roll.rollgenerate', $data);
    }

    public function rollgenerateHere(Request $request)
    {
        if ($request->ajax()) {
            $data['year_id']                = $request->year_id;
            $data['class_id']               = $request->class_id;
            $data['students']               = Assingstudent::where(['year_id' => $request->year_id, 'class_id' => $request->class_id])->latest()->get();
            return view('backend.student.roll.rollajax', $data);
        }
    }
    public function rollgenerateStore(Request $request)
    {
        $this->validate($request, [
            'student_id'                    => 'array',
            'roll'                          => 'array',
            'student_id.*'                  => 'integer',
            'roll.*'                        => 'nullable|integer',

        ]);
        $data['year_id']                    = $request->year_id;
        $data['class_id']                   = $request->class_id;
        if ($request->student_id != NULL) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                Assingstudent::where(['year_id' => $request->year_id, 'class_id' => $request->class_id, 'student_id' => $request->student_id[$i]])->update(['roll' => $request->roll[$i]]);
            }
        }
        toastr('Roll generate successfully', 'success');
        return to_route('student.rollgenerate');
    }
}