<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{

    public function index()
    {
        $data['years'] = Year::latest()->get();
        return view('backend.setup.year.index', $data);
    }


    public function create()
    {
        return view('backend.setup.year.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:years,name'
        ]);
        Year::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Year added successfully', 'success');
        return redirect()->route('setup.year.index');
    }



    public function edit(Year $year)
    {
        return view('backend.setup.year.form', compact('year'));
    }

    public function update(Request $request, Year $year)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:years,name,' . $year->id
        ]);
        $year->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Year updated successfully', 'info');
        return redirect()->route('setup.year.index');
    }


    public function destroy(Year $year)
    {
        $year->delete();
        toastr('Year deleted successfully', 'success');
        return redirect()->route('setup.year.index');
    }
}