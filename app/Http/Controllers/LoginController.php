<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

       if(! auth()->attempt($request->only('email','password'))){
           return redirect()->route('log');
       }


        return redirect()->route('dashboard');
    }
}
