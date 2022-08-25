<?php

namespace App\Http\Controllers\backend\report;

use App\Models\Othercost;
use App\Models\Studentfee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;

class ProfiteController extends Controller
{
    public function index()
    {
        return view('backend.report.profite.index');
    }
    public function profiteGet(Request $request)
    {
        if ($request->ajax()) {

            $data['profites']           = array();
            $data['start_date']         = date('Y-m', strtotime($request->start_date));
            $data['end_date']           = date('Y-m', strtotime($request->end_date));
            $data['sdate']              = date('Y-m-d', strtotime($request->start_date));
            $data['edate']              = date('Y-m-d', strtotime($request->end_date));
            $data['student_fee']        = Studentfee::where('status', 1)->whereBetween('date', [$data['start_date'], $data['end_date']])->sum('amount');
            $data['other_cost']         = Othercost::whereBetween('date', [$data['sdate'], $data['edate']])->sum('amount');
            $data['emp_salary']         = AccountEmployeeSalary::where('status', 1)->whereBetween('date', [$data['start_date'], $data['end_date']])->sum('amount');
            $data['total_cost']         = $data['other_cost'] +  $data['emp_salary'];
            $data['profite']            = $data['student_fee'] - $data['total_cost'];
            return view('backend.report.profite.profiteajax', $data);
        }
    }

    public function profitePdf($start_date, $end_date)
    {

        $data['start_date']         = date('Y-m', strtotime($start_date));
        $data['end_date']           = date('Y-m', strtotime($end_date));
        $data['sdate']              = date('Y-m-d', strtotime($start_date));
        $data['edate']              = date('Y-m-d', strtotime($end_date));

        $pdf = PDF::loadView('backend.report.profite.pdf', $data);
        return $pdf->stream('document.pdf');
    }
}