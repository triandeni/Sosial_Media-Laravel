<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() {
       return view('auth.register.index', [
        "title" => "Register",
        'active'=> 'register',

       ]);
    }

    public function store(RegisterRequest $request) {
        
        user::create($request->all());
        
        
        return redirect('login')->with('success', 'Registration Success! Please Login!');
    }
}
