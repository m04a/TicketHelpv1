<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Breakdown;
use App\Models\User;
use App\Models\Guide;
use App\Models\Suggestion;
use App\Models\Device;
use App\Models\Type;
use App\Models\Zone;
use App\Models\Department;

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
            $data['breakdownCount'] = Breakdown::where('status',1)->count();
            $data['userCount'] = User::get()->count();
            $data['guideCount'] = Guide::get()->count();
            $data['suggestionCount'] = Suggestion::get()->count();
            $data['deviceCount'] = Device::get()->count();
            $data['typeCount'] = Type::get()->count();
            $data['zoneCount'] = Zone::get()->count();
            $data['departmentCount'] = Department::get()->count();
            return view('admin.dashboard', $data);
        }elseif(Auth::check() && Auth::user()->role_id == 1){
            return view('user.dashboard');
        }else{
            return view('auth/login');
        }

    }
}
