<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\SystemUser;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
                return view('auth.register');

    }
    public function store(Request $request)
    {
    //    dd($request->all());
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required',
        //     'password'=>'required|confirmed',

        // ]);
        $validator=Validator::make(
            $request->all(),
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required|confirmed',

            ],
            [
                'name.required'=>'name is required',
                'email.required'=>'email is required',
                'password.required'=>'password is required',
            ]
        );
        $users = new SystemUser;
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->password=Hash::make($request->input('password'));
        // dd($request->input('name'));


        $users->save();
        // Auth::login($users);

        return redirect('/login');
    }
}





