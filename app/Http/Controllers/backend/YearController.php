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

        noty('Year added successfully', 'success');
        return to_route('setup.year.index');
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

        noty('Year updated successfully', 'info');
        return to_route('setup.year.index');
    }


    public function destroy(Year $year)
    {
        $year->delete();
        noty('Year deleted successfully', 'success');
        return to_route('setup.year.index');
    }
}