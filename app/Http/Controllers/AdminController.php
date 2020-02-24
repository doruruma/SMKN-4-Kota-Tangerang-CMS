<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function editPassword()
    {
        return view('admin.editPassword');
    }

    public function postPassword(Request $req)
    {
        $this->passwordValidating();
        $data = [
            'password' => $req->newPass,
        ];
        if (!Hash::check($req->oldPass, Auth::user()->password)) {
            $message = [
                'title' => 'error',
                'message' => 'Invalid Old Password'
            ];
        } else {
            User::where('id', Auth::user()->id)->update($data);
            $message = [
                'title' => 'success',
                'message' => 'Success Updating Password'
            ];
        }
        return redirect(route('admin.password'))->with($message);
    }

    public function edit()
    {
        return view('admin.edit');
    }

    public function update(Request $req)
    {
        $this->profileValidating();
        $data = [
            'name' => $req->name,
            'email' => $req->email
        ];
        User::where('id', Auth::user()->id)->update($data);
        $message = [
            'title' => 'success',
            'message' => 'Success Updating Profile'
        ];
        return redirect(route('admin.edit'))->with($message);
    }

    public function profileValidating()
    {
        return request()->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);
    }

    public function passwordValidating()
    {
        return request()->validate([
            'oldPass' => 'required|min:4',
            'newPass' => 'required|min:4|different:oldPass',
            'conPass' => 'required|same:newPass'
        ]);
    }
}
