<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index(){
        $posts=Post::latest()->paginate(20);
       return view('posts.index',compact('posts'));
   }

   public function store(Request $request){
    $this->validate($request,[
        'body'=>'required',
    ]);

    $request->user()->posts()->create($request->only('body'));

    return back();
   }

   public function destroy(Request $request,Post $post){
dd($post);
        $this->authorize('delete',$post);
        $post->delete();
        return back();
   }
}
