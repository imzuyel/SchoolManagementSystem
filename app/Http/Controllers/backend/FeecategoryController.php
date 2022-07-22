<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Feecategory;
use Illuminate\Http\Request;

class FeecategoryController extends Controller
{

    public function index()
    {
        $data['feecategories'] = Feecategory::latest()->get();
        return view('backend.setup.feecategory.index', $data);
    }


    public function create()
    {
        return view('backend.setup.feecategory.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:feecategories,name'
        ]);
        Feecategory::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Fee Category added successfully', 'success');
        return redirect()->route('setup.feecategory.index');
    }

    public function edit(Feecategory $feecategory)
    {
        return view('backend.setup.feecategory.form', compact('feecategory'));
    }


    public function update(Request $request, Feecategory $feecategory)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:feecategories,name,' . $feecategory->id
        ]);
        $feecategory->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Fee Category  updated successfully', 'info');
        return redirect()->route('setup.feecategory.index');
    }


    public function destroy(Feecategory $feecategory)
    {
        $feecategory->delete();
        toastr('Fee Category deleted successfully', 'success');
        return redirect()->route('setup.feecategory.index');
    }
}