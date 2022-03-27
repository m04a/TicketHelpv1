<?php

namespace App\Http\Controllers;

use App\Models\Service_oauth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public function authUserOauth($provider){

        $user = Socialite::driver($provider)->user();

        /*If the user it's already logged in it means that he want's to add an account.
        Then we make a little autentification check*/
        if(Auth::check()){
        $user_id = Auth::user()->id;

        $user_email = $user->email;

        /*We check if the user is stored in the database with the same provider*/
        $checkUserAuth = Service_oauth::where('user_id',$user_id)
        ->where('provider_label',$provider)->first();

        /*We check if the mail is stored in the database with the same provider*/
        $checkMailoauth = Service_oauth::where('mail',$user_email)
            ->where('provider_label',$provider)->first();

        if(!$checkMailoauth){
          if($checkUserAuth){
           $oauthObjectModel = Service_oauth::find($checkUserAuth->id);

           $oauthObjectModel->mail = $user->email;

           if($oauthObjectModel->save()){
               return redirect('/admin/profile/')->with('success','S\'han actualitzat les dades de l\'usuari.');
           }
          }else{
           $vinculation = Service_oauth::create([
               'provider_label' => $provider,
               'mail' => $user->email,
               'user_id' => $user_id,
           ]);

           if($vinculation){
               return redirect('/admin/profile/')->with('success','S\'han creat les dades de vinculació l\'usuari.');
           }
       }
        }else{
            return redirect('/admin/profile/')->with('error','No s\'han creat les dades de vinculació l\'usuari. El email ja està vinculat amb aquesta un altre compte');
        }
        }else{
            dd("User no logged in");
        }
    }
    public function redirectProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
}
