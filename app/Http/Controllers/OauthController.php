<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OauthController extends Controller
{
    public static function store($user){
        Auth::user()->id;

        dd($user->email);

    }
}
