<?php

namespace App\Http\Controllers\backend\account;

use App\Models\Othercost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class OthercostController extends Controller
{

    public function index()
    {
        $data['othercosts'] = Othercost::latest()->get();
        return view('backend.account.othercost.index', $data);
    }


    public function create()
    {
        return view('backend.account.othercost.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'date'          => 'required',
            'amount'        => 'required',
            'description'   => 'string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);
        $cost               = new Othercost();
        $cost->date         = date('Y-m-d', strtotime($request->date));
        $cost->amount       = $request->amount;
        $file               = $request->hasFile('image');
        $cost->description  = $request->description;
        if ($file) {
            if (file_exists($cost->image)) {
                unlink($cost->image);
            }
            $cost->image    = $this->uploadeImage($request);
        }
        $cost->save();

        noty('Other cost added successfully', 'success');
        return to_route('account.othercost.index');
    }


    public function edit(Othercost $othercost)
    {
        return view('backend.account.othercost.form', compact('othercost'));
    }


    public function update(Request $request, Othercost $othercost)
    {
        $this->validate($request, [
            'date'          => 'required',
            'amount'        => 'required',
            'description'   => 'string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,svg',
        ]);
        $othercost->date        = date('Y-m-d', strtotime($request->date));
        $othercost->amount      = $request->amount;
        $file                   = $request->hasFile('image');
        $othercost->description = $request->description;
        if ($file) {
            if (file_exists($othercost->image)) {
                unlink($othercost->image);
            }
            $othercost->image    = $this->uploadeImage($request);
        }
        $othercost->save();

        noty('Employee added successfully', 'success');
        return to_route('account.othercost.index');
    }



    public function destroy(Othercost $othercost)
    {
        if (file_exists($othercost->image)) {
            unlink($othercost->image);
        }
        $othercost->delete();
        noty('Other cost deleted successfully', 'success');
        return to_route('account.othercost.index');
    }

    //Image intervetion
    protected function uploadeImage($request)
    {
        $file           = $request->file("image");
        $get_imageName  =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
        $directory      = 'images/othercost/';
        $imageUrl       = $directory . $get_imageName;
        Image::make($file)->resize(600, 400)->save($imageUrl);
        return $imageUrl;
    }
}
