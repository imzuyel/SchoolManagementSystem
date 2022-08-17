<?php

namespace App\Http\Controllers\backend;

use App\Models\Feeamount;
use App\Models\Feecategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeeamountController extends Controller
{

    public function index()
    {
        $data['feeamounts'] = Feeamount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.feeamount.index', $data);
    }


    public function create()
    {
        $data['feecategories'] = Feecategory::where('status', true)->get();
        $data['classes'] = StudentClass::where('status', true)->get();
        return view('backend.setup.feeamount.form', $data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'fee_category_id'               => 'required|string',
            'class_id'                      => 'required',
            'amount'                        => 'required',
            'amount.*'                      => 'required',
        ], [
            'class_id.unique'               => 'Class already selected',
        ]);
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $feeamount                  = new Feeamount();
                $feeamount->fee_category_id = $request->fee_category_id;
                $feeamount->class_id        = $request->class_id[$i];
                $feeamount->amount          = $request->amount[$i];
                $feeamount->save();
            }
        }

        toastr('Fee Amount added successfully', 'success');
        return to_route('setup.feeamount.index');
    }


    public function show($id)
    {
        $data['showdata'] = Feeamount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.feeamount.show', $data);
    }


    public function edit($id)

    {
        $data['editData']                   = Feeamount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();
        $data['feecategories']              = Feecategory::where('status', true)->get();
        $data['classes']                    = StudentClass::where('status', true)->get();
        return view('backend.setup.feeamount.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'fee_category_id'               => 'required|string',
            'class_id'                      => 'required',
            'amount'                        => 'required',
            'amount.*'                      => 'required',
        ], [
            'class_id.unique'               => 'Class already selected',
        ]);
        Feeamount::where("fee_category_id", $id)->delete();
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $feeamount                  = new Feeamount();
                $feeamount->fee_category_id = $request->fee_category_id;
                $feeamount->class_id        = $request->class_id[$i];
                $feeamount->amount          = $request->amount[$i];
                $feeamount->save();
            }
        }
        toastr('Fee Amount updated successfully', 'success');
        return to_route('setup.feeamount.index');
    }

    public function destroy(Feeamount $feeamount)
    {
        $feeamount->delete();
        toastr('Fee amount deleted successfully', 'success');
        return to_route('setup.feeamount.index');
    }
}