<?php

namespace App\Http\Controllers\backend\account;

use App\Models\Year;
use App\Models\Feeamount;
use App\Models\Studentfee;
use App\Models\Feecategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Assingstudent;
use App\Http\Controllers\Controller;

class StudentFeeController extends Controller
{

    public function index()
    {
        $data['studentfees'] = Studentfee::where('status', 1)->latest()->get();
        return view('backend.account.studentfee.index', $data);
    }


    public function create()
    {
        $data['years'] = Year::latest()->get();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = Feecategory::latest()->get();
        return view('backend.account.studentfee.form', $data);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data['year_id'] = $request->year_id;
            $data['class_id'] = $request->class_id;
            $data['fee_category_id'] = $request->fee_category_id;
            $data['date'] = date('Y-m', strtotime($request->date));

            $data['students'] = Assingstudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();

            $data['registrationfee'] = Feeamount::where('fee_category_id', $data['fee_category_id'])
                ->where('class_id', $data['class_id'])
                ->first();

            return view('backend.account.studentfee.addajax', $data);
        }
    }
    public function store(Request $request)
    {


        $date = date('Y-m', strtotime($request->date));

        Studentfee::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('fee_category_id', $request->fee_category_id)->where('date', $request->date)->delete();

        $student = $request->student_id;

        if ($student != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                $data = new Studentfee();
                $pay_status = 'pay_status' . $i;
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$i];
                $data->amount = $request->amount[$i];
                if ($request->$pay_status === "pay") {
                    $data->status = 1;
                } else {
                    $data->status = 0;
                }
                $data->save();
            }
            noty("Fee added saved", 'success');
            return to_route('account.studentfee.index');
        }
    }
}
