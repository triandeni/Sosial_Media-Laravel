<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function edit() 
    {
        return view('auth.password.edit', [
            'title' => 'Change Password',
            'active' => 'profile',
        ]);
    }

    public function update(Request $request)
    {
        $request ->validate([
            'current_password' =>['required'],
            'password' => ['required','min:6','confirmed'],
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('message', 'Your Password has been updated');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not match with our record',
        ]);
    }
}
