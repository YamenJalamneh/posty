<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }
    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:25',
            'username'=>'required|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed',
        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }
}
