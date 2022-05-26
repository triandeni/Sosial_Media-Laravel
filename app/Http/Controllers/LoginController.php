<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create () {
        return view('auth.login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required'],
        ]);
   
        if(Auth::attempt($credentials)) {
            return redirect('/timeline')->with('success', 'Login Success');
        }
   
        return back()->with('loginError', 'Login Failed');
       }

       public function logout(Request $request) 
       {
           Auth::logout();
   
           $request->session()->invalidate();
       
           $request->session()->regenerateToken();
       
           return redirect('/login');
       }
   
    
}
