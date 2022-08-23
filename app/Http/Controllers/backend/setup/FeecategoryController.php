<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\Feecategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        noty('Fee Category added successfully', 'success');
        return to_route('setup.feecategory.index');
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

        noty('Fee Category  updated successfully', 'info');
        return to_route('setup.feecategory.index');
    }


    public function destroy(Feecategory $feecategory)
    {
        $feecategory->delete();
        noty('Fee Category deleted successfully', 'success');
        return to_route('setup.feecategory.index');
    }
}