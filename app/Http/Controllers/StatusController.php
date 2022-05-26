<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function store (StatusRequest $request)
    {
    Status::create([
        'body' => $request->body,
        'identifier' => Str::slug(Str::random(32)),
        'user_id' => Auth::id(),
    ]);

    return back();
    }
}
