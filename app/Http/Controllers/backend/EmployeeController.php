<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Designation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function index()
    {

        $data['employees'] = User::where('user_type', 'Employee')->latest()->get();
        return view('backend.employee.register.index', $data);
    }

    public function create()
    {
        $data['designations'] = Designation::where('status', 1)->latest()->get();
        return view('backend.employee.register.form', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                          => 'required|string',
            'email'                         => 'required|string|unique:users,email',
            'image'                         => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);
        $get_year                           = date('Ym', strtotime($request->join_date));
        $name                               = Str::lower($request->name);
        $generate_id                        = $get_year . '-' . str_replace(' ', '-', $name);;
        $user                               = new User();
        $user->name                         = $request->name;
        $user->user_type                    = "Employee";
        $user->email                        = $request->email;
        $code                               = rand(00000, 99999);
        $user->code                         = $code;
        $user->password                     = bcrypt($code);
        $user->salary                       = $request->salary;
        $user->mobile                       = $request->mobile;
        $user->address                      = $request->address;
        $user->gender                       = $request->gender;
        $user->father_name                  = $request->father_name;
        $user->mother_name                  = $request->mother_name;
        $user->religion                     = $request->religion;
        $user->id_no                        = $generate_id;
        $user->date_of_birth                = date('Y-m-d', strtotime($request->date_of_birth));
        $user->join_date                    = date('Y-m-d', strtotime($request->join_date));
        $user->religion                     = $request->religion;
        $user->designation_id               = $request->designation_id;
        $user->status                       =  $request->filled('status');
        $user->save();

        $employesalary                      = new EmployeeSalary();
        $employesalary->employee_id         = $user->id;
        $employesalary->effected_salary     = date('Y-m-d', strtotime($request->join_date));
        $employesalary->previous_salary     = $request->salary;
        $employesalary->present_salary      = $request->salary;
        $employesalary->increment_salary    = '0';
        $employesalary->save();

        $file                               = $request->hasFile('image');
        if ($file) {
            if (file_exists($user->profile_photo_path)) {
                unlink($user->profile_photo_path);
            }
            $user->profile_photo_path       = $this->uploadeImage($request);
        }
        $user->save();

        noty('Employee added successfully', 'success');

        return redirect()->route('employee.register.index');
    }

    public function show($id)
    {
        $data['employee']           = User::findOrFail($id);
        $pdf = Pdf::loadView('backend.employee.register.pdf', $data);
        return $pdf->stream();
    }
    public function edit($id)
    {
        $data['employee']           = User::findOrFail($id);
        $data['designations']   = Designation::where('status', 1)->latest()->get();
        return view('backend.employee.register.form', $data);
    }


    public function update(Request $request, $id)
    {
        $user                               = User::findOrFail($id);
        $this->validate($request, [
            'name'                          => 'required|string',
            'email'                         => 'required|string|unique:users,email,' . $user->id,
            'image'                         => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);
        $get_year                           = date('Ym', strtotime($request->join_date));
        $name                               = Str::lower($request->name);
        $generate_id                        = $get_year . '-' . str_replace(' ', '-', $name);;
        $user->name                         = $request->name;
        $user->user_type                    = "Employee";
        $user->email                        = $request->email;
        $code                               = rand(00000, 99999);
        $user->code                         = $code;
        $user->password                     = bcrypt($code);
        $user->salary                       = $request->salary;
        $user->mobile                       = $request->mobile;
        $user->address                      = $request->address;
        $user->gender                       = $request->gender;
        $user->father_name                  = $request->father_name;
        $user->mother_name                  = $request->mother_name;
        $user->religion                     = $request->religion;
        $user->id_no                        = $generate_id;
        $user->date_of_birth                = date('Y-m-d', strtotime($request->date_of_birth));
        $user->join_date                    = date('Y-m-d', strtotime($request->join_date));
        $user->religion                     = $request->religion;
        $user->designation_id               = $request->designation_id;
        $user->status                       =  $request->filled('status');
        $user->save();
        $file                               = $request->hasFile('image');
        if ($file) {
            if (file_exists($user->profile_photo_path)) {
                unlink($user->profile_photo_path);
            }
            $user->profile_photo_path       = $this->uploadeImage($request);
        }
        $user->save();

        noty('Employee updated successfully', 'success');

        return to_route('employee.register.index');
    }


    public function destroy($id)
    {
        $user           = User::findOrFail($id);
        $usersalary     = EmployeeSalary::where('employee_id', $user->id);
        $usersalary->delete();
        $user->delete();
        noty('Employee deleted successfully', 'success');
        return redirect()->route('employee.register.index');
    }

    //Image intervetion
    protected function uploadeImage($request)
    {
        $file           = $request->file("image");
        $get_imageName  =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
        $directory      = 'images/employees/';
        $imageUrl       = $directory . $get_imageName;
        Image::make($file)->resize(600, 400)->save($imageUrl);
        return $imageUrl;
    }
}