<?php

namespace App\Http\Controllers;

use App\Models\Service_oauth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OauthController extends Controller
{
    public static function store($user,$provider){

        $user_id = Auth::user()->id;

        $oauth = Service_oauth::where('id',$user_id)
        ->where('provider_label',$provider)->get();
        dd($oauth);
       if($oauth){
           dd("dsfdsaf");
       }else{
           $vinculations = Service_oauth::create([
               'provider_label' => $provider,
               'mail' => $user->email,
               'user_id' => $user_id,
           ]);
       }
        Service_oauth::user()->id;
        dd($user->email);

    }
}
