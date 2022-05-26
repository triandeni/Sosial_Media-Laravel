<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function index (Request $request)
    {
        $following = Auth::user()->follows->pluck('id');
         $statuses = Status::whereIn('user_id', $following)
         ->orWhere('user_id', Auth::user()->id)
         ->latest()
         ->get();

         return view ('timeline.index',  [
            'title' => 'timeline',
             'active' => 'timeline',
             'statuses' => $statuses
            ]);

    }

}
