<?php

namespace App\Http\Controllers\backend\student;

use App\Models\Year;
use App\Models\Feeamount;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Assingstudent;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class RegistrationfeeController extends Controller
{
    public  function regfee()
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['year_id']                    = Year::orderBy('id', 'desc')->first()->id;
        $data['class_id']                   = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['feecategoryamount']          = Feeamount::where('fee_category_id', 1)->where('class_id', $data['class_id'],)->first();
        $data['students']                   = Assingstudent::where(['year_id' => $data['year_id'], 'class_id' => $data['class_id']])->latest()->get();
        return view('backend.student.regFee.index', $data);
    }

    public  function regfeepdf($user_id, $class_id)
    {
        $data['feecategoryamount']          = Feeamount::where('fee_category_id', 1)->where('class_id', $class_id)->first();
        $data['student']                    = Assingstudent::where('student_id', $user_id)->where('class_id', $class_id)->first();
        $pdf                                = Pdf::loadView('backend.student.regFee.pdf', $data);
        return $pdf->stream();
    }

    public function regfeeget(Request $request)
    {
        if ($request->ajax()) {
            $data['year_id']                = $request->year_id;
            $data['class_id']               = $request->class_id;
            $data['examtype']               = $request->examtype;
            $data['feecategoryamount']      = Feeamount::where('fee_category_id', 1)->where('class_id', $request->class_id)->first();
            $data['students']               = Assingstudent::where(['year_id' => $request->year_id, 'class_id' => $request->class_id])->latest()->get();
            return view('backend.student.regFee.regfeeajax', $data);
        }
    }
}