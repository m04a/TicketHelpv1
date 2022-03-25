<?php

namespace App\Http\Controllers;

use App\Models\Service_oauth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OauthController extends Controller
{
    public static function store($user,$provider){

        $oauth = Service_oauth::where('id',Auth::user()->id)
        ->where('provider',$provider)->get();
        dd($oauth);
       if($oauth){
           dd("User exists");
       }else{
           dd("User doesn't exist");

       }
        Service_oauth::user()->id;
        dd($user->email);

    }
}
