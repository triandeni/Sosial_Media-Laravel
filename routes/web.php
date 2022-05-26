<?php

use App\Http\Controllers\FollowingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StrangerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('home', [
        "title" => "Home",
        'active' => 'home'
    ]);
});
Route::get('/profil', function () {
    return view('profile', [
        "title" => "profil",
        'active'=> 'profil',
        
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'active'=> 'about',
        
    ]);
});
Route::get('/contact', function () {
    return view('contact', [
        "title" => "contact",
        'active'=> 'contact',
        
    ]);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 

Route::get('user', [UserController::class, 'index']);
Route::get('user/{user:username}', [UserController::class, 'show']);

Route::middleware('guest')->group(function () {     

    Route::get('register',[RegisterController::class,'create']);
    Route::post('register',[RegisterController::class,'store']);
    Route::get('login',[LoginController::class,'create']);
    Route::post('login',[LoginController::class,'store']);
});

Route::middleware('auth')->group(function () {

Route::get('timeline', [TimelineController::class,'index']);
Route::post('status',[StatusController::class,'store']);
Route::resource('task', TaskController::class);
Route::get('profile/{user}/following',[FollowingController::class,'following'])->name('profile.following');
Route::get('profile/{user}/followers',[FollowingController::class,'followers'])->name('profile.follower');
Route::post('profile/{user}',[FollowingController::class,'store'])->name('following.store');
Route::get('stranger', StrangerController::class)->name('stranger.index');

Route::get('profile/{user}', [ProfileController::class,'show'])->name('profile');
Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('password/edit', [PasswordController::class, 'edit']) ->name('password.edit');
Route::put('password/update', [PasswordController::class,'update'])->name('password.update');
});

