<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user){
        dd($user);
        $posts=$user->posts()->paginate(5);
        return view('users.index',[
            'posts'=>$posts,
            'user'=>$user,
        ]);
    }
}
