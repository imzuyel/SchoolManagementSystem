<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{

    public function index()
    {
        $data['shifts'] = Shift::latest()->get();
        return view('backend.setup.shift.index', $data);
    }


    public function create()
    {
        return view('backend.setup.shift.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:shifts,name'
        ]);
        Shift::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Shift added successfully', 'success');
        return redirect()->route('setup.shift.index');
    }


    public function edit(Shift $shift)
    {
        return view('backend.setup.shift.form', compact('shift'));
    }


    public function update(Request $request, Shift $shift)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:shifts,name,' . $shift->id
        ]);
        $shift->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Shift updated successfully', 'info');
        return redirect()->route('setup.shift.index');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        toastr('Shift deleted successfully', 'error');
        return redirect()->route('setup.shift.index');
    }
}