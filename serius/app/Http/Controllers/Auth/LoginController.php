<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ]);

        $user = [
            'username'=>$request->username,
            'password'=>$request->password,
        ];

        Auth::attempt($user);
        if(Auth::check()) {
            return redirect()->route('dashboard');
        } else{
            return redirect('login');
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
