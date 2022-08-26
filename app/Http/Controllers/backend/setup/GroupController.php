<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::all();
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

        noty('Group added successfully', 'success');
        return to_route('setup.group.index');
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

        noty('Group updated successfully', 'info');
        return to_route('setup.group.index');
    }


    public function destroy(Group $group)
    {
        $group->delete();
        noty('Group deleted successfully', 'success');
        return to_route('setup.group.index');
    }
}