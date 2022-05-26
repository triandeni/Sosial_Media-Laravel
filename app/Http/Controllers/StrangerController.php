<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StrangerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
     return view('user.index', [
         'title' => 'stanger',
         'active' => 'stranger',
         'users' => User::simplePaginate(12),
     ]);
    }
}
