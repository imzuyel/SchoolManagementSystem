<?php

namespace App\Http\Controllers\backend;

use App\Models\Year;
use App\Models\Examtype;
use App\Models\Feeamount;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Assingstudent;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ExamfeeController extends Controller
{
    public  function examfee()
    {
        $data['exams']                      = Examtype::where('status', true)->get();
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['year_id']                    = Year::orderBy('id', 'desc')->first()->id;
        $data['class_id']                   = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['feecategoryamount']          = Feeamount::where('fee_category_id', 3)->where('class_id', $data['class_id'],)->first();
        $data['examtype']                   = Examtype::where('status', true)->first()->name;
        $data['students']                   = Assingstudent::where(['year_id' => $data['year_id'], 'class_id' => $data['class_id']])->latest()->get();

        return view('backend.student.examFee.index', $data);
    }


    public  function examfeepdf($user_id, $class_id, $examtype)
    {

        $data['feecategoryamount']          = Feeamount::where('fee_category_id', 3)->where('class_id', $class_id)->first();
        $data['student']                    = Assingstudent::where('student_id', $user_id)->where('class_id', $class_id)->first();
        $data['examtype']                   = $examtype;
        $pdf                                = Pdf::loadView('backend.student.examFee.pdf', $data);
        return $pdf->stream();
    }

    public function examfeeget(Request $request)
    {
        if ($request->ajax()) {
            $data['year_id']                = $request->year_id;
            $data['examtype']               = $request->examtype;
            $data['class_id']               = $request->class_id;
            $data['feecategoryamount']      = Feeamount::where('fee_category_id', 1)->where('class_id', $request->class_id)->first();
            $data['students']               = Assingstudent::where(['year_id' => $request->year_id, 'class_id' => $request->class_id])->latest()->get();
            return view('backend.student.examFee.examfeeajax', $data);
        }
    }
}