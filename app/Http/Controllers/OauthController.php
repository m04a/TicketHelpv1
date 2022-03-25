<?php

namespace App\Http\Controllers;

use App\Models\Service_oauth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public static function store($provider){

        dd($provider);
        $user = Socialite::driver('google')->user();

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
            Service_oauth::create([
               'provider_label' => $provider,
               'mail' => $user->email,
               'user_id' => $user_id,
           ]);
           return redirect('/admin/profile')->with('status', 'Profile updated!');
              // return view('admin.profile.index')->with('success',"S'han afegit la teva vinculació nova!");
       }
        dd($user->email);

    }
}
