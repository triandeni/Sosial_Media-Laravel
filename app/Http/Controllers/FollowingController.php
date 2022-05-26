<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class FollowingController extends Controller
{
    public function following (User $user)
    {
        return view('user.following', [
            'title' => 'following',
            'active' => 'profile',
            'following' => $user->follows,
            'user' => $user
        ]);

    }

    public function followers (User $user)
    {
        return view('user.followers', [
            'title' => 'followers',
            'active' => 'profile',
            'followers' => $user->followers,
            'user' => $user
        ]);
    }

    public function store (Request $request, User $user)
    {
        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);
        return back()->with('success', 'follow success');

    }
    
}
