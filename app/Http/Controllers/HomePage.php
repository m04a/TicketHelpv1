<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePage extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if (Auth::check() && Auth::user()->role_id > 1){
            return view('admin.dashboard');
        }elseif(Auth::check() && Auth::user()->role_id == 1){
            return view('user.dashboard');
        }else{
            return view('auth/login');
        }
        
    }
}
