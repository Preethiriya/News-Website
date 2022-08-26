<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SystemUser;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            $user = SystemUser::where('email',$email)->first();
            Auth::login($user);
            return redirect('/about');
        }else{
            return back()->withErrors(['invalid credentials!']);
        }


    }

   /* public function logout() {
        Auth::logout();
        return redirect('/login');*/
}

