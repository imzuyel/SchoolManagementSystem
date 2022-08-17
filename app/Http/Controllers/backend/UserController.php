<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function index()
    {
        $data['users'] = User::latest()->get();
        return view('users.index', $data);
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string',
            'user_type'             => 'required|string',
            'email'                 => 'required|string|unique:users,email',
            'password'              => 'nullable|string',
            'image'                 => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);
        $user                       = new User();
        $user->name                 = $request->name;
        $user->user_type            = $request->user_type;
        $user->email                = $request->email;
        if ($request->password) {
            $user->password         = $request->password;
        } else {
            $code                   = rand(00000, 99999);
            $user->code             = $code;
            $user->password         = bcrypt($code);
        }

        $file                       = $request->hasFile('image');
        if ($file) {
            if (file_exists($user->profile_photo_path)) {
                unlink($user->profile_photo_path);
            }
            $user->profile_photo_path = $this->uploadeImage($request);
        }
        $user->save();
        toastr('User added successfully', 'success');

        return to_route('user.index');
    }

    public function edit(User $user)
    {
        return view('users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'                  => 'required|string',
            'user_type'             => 'required|string',
            'email'                 => 'required|string|unique:users,email,' . $user->id,
            'image'                 => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);
        $user->name                 = $request->name;
        $user->email                = $request->email;
        $user->user_type            = $request->user_type;

        $file                       = $request->hasFile('image');
        if ($file) {
            if (file_exists($user->profile_photo_path)) {
                unlink($user->profile_photo_path);
            }
            $user->profile_photo_path = $this->uploadeImage($request);
        }
        $user->save();
        toastr('User updated successfully', 'info');
        return to_route('user.index');
    }

    public function destroy(User $user)
    {
        if (file_exists($user->profile_photo_path)) {
            unlink($user->profile_photo_path);
        }
        $user->delete();
        toastr('Category deleted successfully', 'success');
        return to_route('user.index');
    }

    public function userProfile()
    {
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('users.profile', $data);
    }
    public function userProfilrUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $this->validate($request, [
            'name'                      => 'required|string',
            'mobile'                    => 'required|string',
            'address'                   => 'required|string',
            'gender'                    => 'required|string',
            'about'                     => 'required|string',
            'email'                     => 'required|string|unique:users,email,' . $user->id,
            'image'                     => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);

        $user->name                     = $request->name;
        $user->email                    = $request->email;
        $user->mobile                   = $request->mobile;
        $user->address                  = $request->address;
        $user->gender                   = $request->gender;
        $user->about                    = $request->about;


        $file                           = $request->hasFile('image');
        if ($file) {
            if (file_exists($user->profile_photo_path)) {
                unlink($user->profile_photo_path);
            }
            $user->profile_photo_path   = $this->uploadeImage($request);
        }
        $user->save();
        toastr('User updated successfully', 'info');
        return redirect()->back();
    }
    public function userProfilrPasswordUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $this->validate($request, [
            'old_password'              => 'required',
            'password'                  => 'required|min:4|confirmed',

        ]);
        $hashPassword                   = $user->password;
        if (Hash::check($request->old_password, $hashPassword)) {
            $user->password             = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return to_route('login');
            toastr('Password updated successfully', 'info');
        } else {
            toastr('Your old password is invalid', 'error');
            return redirect()->back();
        }
    }

    //Image intervetion
    protected function uploadeImage($request)
    {
        $file           = $request->file("image");
        $get_imageName  =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
        $directory      = 'images/users/';
        $imageUrl       = $directory . $get_imageName;
        Image::make($file)->resize(600, 400)->save($imageUrl);
        return $imageUrl;
    }
}