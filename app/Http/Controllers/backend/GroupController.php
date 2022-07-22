<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        $data['groups'] = Group::latest()->get();
        return view('backend.setup.group.index', $data);
    }


    public function create()
    {
        return view('backend.setup.group.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:groups,name'
        ]);
        Group::create([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Group added successfully', 'success');
        return redirect()->route('setup.group.index');
    }

    public function edit(Group $group)
    {
        return view('backend.setup.group.form', compact('group'));
    }

    function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name'                  => 'required|string|unique:groups,name,' . $group->id
        ]);
        $group->update([
            'name'                  => $request->name,
            'status'                => $request->filled('status'),
        ]);

        toastr('Group updated successfully', 'info');
        return redirect()->route('setup.group.index');
    }


    public function destroy(Group $group)
    {
        $group->delete();
        toastr('Group deleted successfully', 'success');
        return redirect()->route('setup.group.index');
    }
}