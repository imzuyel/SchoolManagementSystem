<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Year;
use App\Models\Group;
use App\Models\Shift;
use App\Models\Discount;
use App\Models\Feecategory;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Assingstudent;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AssingstudentController extends Controller
{

    public function index()
    {

        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['year_id']                    = Year::orderBy('id', 'desc')->first()->id;
        $data['class_id']                   = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['students']                   = Assingstudent::where(['year_id' => $data['year_id'], 'class_id' => $data['class_id']])->latest()->get();

        return view('backend.student.register.index', $data);
    }


    public function create()
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['shifts']                     = Shift::latest()->where('status', true)->get();
        $data['groups']                     = Group::latest()->where('status', true)->get();
        return view('backend.student.register.form', $data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name'                          => 'required|string',
            'email'                         => 'required|string|unique:users,email',
            'password'                      => 'nullable|string',
            'image'                         => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);
        $get_year                           = Year::findOrFail($request->year_id)->name;
        $get_class                          = Str::lower(StudentClass::findOrFail($request->class_id)->name);
        $name                               = Str::lower($request->name);
        $generate_id                        = $get_year . '-' . $get_class . '-' . str_replace(' ', '-', $name);;
        $user                               = new User();
        $user->name                         = $request->name;
        $user->user_type                    = "student";
        $user->email                        = $request->email;
        $code                               = rand(00000, 99999);
        $user->code                         = $code;
        $user->password                     = bcrypt($code);
        $user->mobile                       = $request->mobile;
        $user->address                      = $request->address;
        $user->gender                       = $request->gender;
        $user->father_name                  = $request->father_name;
        $user->mother_name                  = $request->mother_name;
        $user->religion                     = $request->religion;
        $user->id_no                        = $generate_id;
        $user->date_of_birth                = date('Y-m-d', strtotime($request->date_of_birth));
        $user->religion                     = $request->religion;
        $user->status                       =  $request->filled('status');
        $user->save();

        $assingstudent                      = new Assingstudent();
        $assingstudent->student_id          = $user->id;
        $assingstudent->class_id            = $request->class_id;
        $assingstudent->year_id             = $request->year_id;
        $assingstudent->group_id            = $request->group_id;
        $assingstudent->shift_id            = $request->shift_id;
        $assingstudent->save();

        $feecategory_name                   = Feecategory::where('name', 'Registration Fee')->first()->id;
        $discount                           = new Discount();
        $discount->assingstudent_id         = $assingstudent->id;
        if ($feecategory_name) {
            $discount->fee_category_id      = $feecategory_name;
        } else {
            $assingstudent->fee_category_id = 1;
        }
        $discount->discount                 = $request->discount;
        $discount->save();

        $file                               = $request->hasFile('image');
        if ($file) {
            if (file_exists($user->profile_photo_path)) {
                unlink($user->profile_photo_path);
            }
            $user->profile_photo_path       = $this->uploadeImage($request);
        }
        $user->save();

        noty('Student added successfully', 'success');

        return to_route('student.assingstudent.index');
    }

    public function show(Assingstudent $assingstudent)
    {
        //
    }


    public function edit($id)
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['shifts']                     = Shift::latest()->where('status', true)->get();
        $data['groups']                     = Group::latest()->where('status', true)->get();
        $data['assingstudent']              = Assingstudent::where('student_id', $id)->first();
        return view('backend.student.register.form', $data);
    }


    public function update(Request $request, $id)
    {
        $user                               = User::where('id', $id)->first();
        $this->validate($request, [
            'name'                          => 'required|string',
            'email'                         => 'required|string|unique:users,email,' . $user->id,
            'password'                      => 'nullable|string',
            'image'                         => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);

        $get_year                           = Year::findOrFail($request->year_id)->name;
        $get_class                          = Str::lower(StudentClass::findOrFail($request->class_id)->name);
        $name                               = Str::lower($request->name);
        $generate_id                        = $get_year . '-' . $get_class . '-' . str_replace(' ', '-', $name);;
        $user->name                         = $request->name;

        $user->user_type                    = "student";
        $user->email                        = $request->email;
        $code                               = rand(00000, 99999);
        $user->code                         = $code;
        $user->password                     = bcrypt($code);
        $user->mobile                       = $request->mobile;
        $user->address                      = $request->address;
        $user->gender                       = $request->gender;
        $user->father_name                  = $request->father_name;
        $user->mother_name                  = $request->mother_name;
        $user->religion                     = $request->religion;
        $user->id_no                        = $generate_id;
        $user->date_of_birth                = date('Y-m-d', strtotime($request->date_of_birth));
        $user->religion                     = $request->religion;
        $user->status                       =  $request->filled('status');
        $user->save();

        $assingstudent                      =  Assingstudent::where('student_id', $id)->first();
        $assingstudent->student_id          = $user->id;
        $assingstudent->class_id            = $request->class_id;
        $assingstudent->year_id             = $request->year_id;
        $assingstudent->group_id            = $request->group_id;
        $assingstudent->shift_id            = $request->shift_id;
        $assingstudent->save();

        $feecategory_name                   = Feecategory::where('name', 'Registration Fee')->first()->id;
        $discount                           = Discount::where('assingstudent_id', $assingstudent->id)->first();
        $discount->assingstudent_id         = $assingstudent->id;
        if ($feecategory_name) {
            $discount->fee_category_id      = $feecategory_name;
        } else {
            $assingstudent->fee_category_id = 1;
        }
        $discount->discount                 = $request->discount;
        $discount->save();

        $file                               = $request->hasFile('image');
        if ($file) {
            if (file_exists($user->profile_photo_path)) {
                unlink($user->profile_photo_path);
            }
            $user->profile_photo_path       = $this->uploadeImage($request);
        }
        $user->save();

        noty('Student updated successfully', 'success');

        return to_route('student.assingstudent.index');
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $assingstudent = Assingstudent::where('student_id', $id)->first();
        $discount = Discount::where('assingstudent_id', $assingstudent->id)->first();
        $user->delete();
        $discount->delete();
        $assingstudent->delete();
        noty('Student deleted successfully', 'success');

        return to_route('student.assingstudent.index');
    }



    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data['yearname']                   = Year::where('id', $request->year_id)->first();
            $data['classname']                  = StudentClass::where('id', $request->class_id)->first();
            $data['students']     = Assingstudent::where(['year_id' => $request->year_id, 'class_id' => $request->class_id])->latest()->get();
            return view('backend.student.register.ajax', $data);
        }
    }

    public function promotion($id)
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['shifts']                     = Shift::latest()->where('status', true)->get();
        $data['groups']                     = Group::latest()->where('status', true)->get();
        $data['assingstudent']              = Assingstudent::where('student_id', $id)->first();
        return view('backend.student.register.promotion', $data);
    }

    public function promotionNew(Request $request, $id)
    {


        $assingstudent                      = new Assingstudent();
        $assingstudent->student_id          = $id;
        $assingstudent->class_id            = $request->class_id;
        $assingstudent->year_id             = $request->year_id;
        $assingstudent->group_id            = $request->group_id;
        $assingstudent->shift_id            = $request->shift_id;
        $assingstudent->save();

        $feecategory_name                   = Feecategory::where('name', 'Registration Fee')->first()->id;
        $discount = new Discount();
        $discount->assingstudent_id         = $assingstudent->id;
        if ($feecategory_name) {
            $discount->fee_category_id      = $feecategory_name;
        } else {
            $assingstudent->fee_category_id = 1;
        }
        $discount->discount                 = $request->discount;
        $discount->save();

        noty('Student promote successfully', 'success');

        return to_route('student.assingstudent.index');
    }

    public function pdf($id)
    {
        $data['years']                      = Year::latest()->where('status', true)->get();
        $data['classes']                    = StudentClass::latest()->where('status', true)->get();
        $data['shifts']                     = Shift::latest()->where('status', true)->get();
        $data['groups']                     = Group::latest()->where('status', true)->get();
        $data['assingstudent']              = Assingstudent::where('student_id', $id)->first();
        return view('backend.student.register.pdf', $data);
    }


    //Image intervetion
    protected function uploadeImage($request)
    {
        $file           = $request->file("image");
        $get_imageName  =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
        $directory      = 'images/students/';
        $imageUrl       = $directory . $get_imageName;
        Image::make($file)->resize(600, 400)->save($imageUrl);
        return $imageUrl;
    }
}