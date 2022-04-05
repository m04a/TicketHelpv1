<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Breakdown;

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
            $data['questionCount'] = Question::where('status',1)->count();
            $data['questionCountPendents'] = Question::where('status',2)->count();
            $data['questionCountResoltes'] = Question::where('status',3)->count();
            $data['breakdownCount'] = Breakdown::where('status',1)->count();
            $data['breakdownCountPendents'] = Breakdown::where('status',2)->count();
            $data['breakdownCountResoltes'] = Breakdown::where('status',3)->count();
            return view('admin.dashboard', $data);
        }elseif(Auth::check() && Auth::user()->role_id == 1){
            return view('user.dashboard');
        }else{
            return view('auth/login');
        }

    }
}
