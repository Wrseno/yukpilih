<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register()
    {
        $division = Division::get();
        return view('auth.register', compact('division'));
    }

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'role'=>'required',
            'division_id'=>'required',
        ]);

        $user = User::create([
            'username'=>$request->username,
            'password'=>bcrypt('12345'),
            'role'=>$request->role,
            'division_id'=>$request->division_id,
        ]);

        if($user){
            return redirect()->route('login')->with('success', 'Register Successfully');
        }
    }
}
