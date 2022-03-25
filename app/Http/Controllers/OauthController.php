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
       if(!$oauth->isEmpty()){
           $oauth->mail = $user->email;
           if($oauth->save()){
               return back()->with('success',"S'han actualitzat les dades satisfactoriament");
           }else{
               return back()->with('error',"No s'han pogut actualitzar les dades");
           }
       }else{
           $vinculation = Service_oauth::create([
               'provider_label' => $provider,
               'mail' => $user->email,
               'user_id' => $user_id,
           ]);
           if($vinculation){
               return back()->with('success',"S'han afegit la teva vinculació amb -> $provider");
           }
       }
        dd($user->email);

    }
}
