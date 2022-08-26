<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    public function index()
    {
        $data['shifts'] = Shift::all();
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

        noty('Shift added successfully', 'success');
        return to_route('setup.shift.index');
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

        noty('Shift updated successfully', 'info');
        return to_route('setup.shift.index');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        noty('Shift deleted successfully', 'success');
        return to_route('setup.shift.index');
    }
}