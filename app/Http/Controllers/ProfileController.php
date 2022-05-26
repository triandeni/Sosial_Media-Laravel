<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request, User $user) {
        return view('user.show', [
            'title' => 'profile',
            'active' => 'profile',
            'user' => $user,
            'statuses' => $user->statuses()->latest()->get(),

        ]);
       
    }
    public function edit() 
    {
        return view('user.edit' , [
            'title' => 'edit profile',
            'active' => 'profile',
        ]);
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => ['string', 'min:4', 'max:50', 'required'],
            'email' => ['email', 'string', 'min:4', 'max:50', 'required'],
            'username' => ['required', 'alpha_num', 'unique:users,username,'. auth()->id()],
        ]);

        auth()->user()->update($attr);

        return redirect()
                    ->route('profile', auth()->user()->username)
                    ->with('message','Your profile has been updated');
    }
}
