<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('/logout',\App\Http\Controllers\LogoutController::class)->name('logout');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('log');
Route::post('/sign_in',[\App\Http\Controllers\RegisterController::class,'register'])->name('sign_in');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'show'])->name('dashboard');
});
Route::get('/users/{user:username}/posts',[\App\Http\Controllers\UserController::class,'index'])->name('users.posts');
Route::get('register',[\App\Http\Controllers\RegisterController::class,'show'])->name('register');
Route::get('/login',[\App\Http\Controllers\LoginController::class,"index"])->name('login');
Route::get('/posts',[\App\Http\Controllers\PostController::class,"index"])->name('posts');
Route::delete('/posts/{post}',[\App\Http\Controllers\PostController::class,"destroy"])->name('posts.destroy');
Route::post('/post',[\App\Http\Controllers\PostController::class,'store'])->name('insert');
