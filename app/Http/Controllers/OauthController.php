<?php

namespace App\Http\Controllers;

use App\Models\Service_oauth;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    /**
     * Vinculate count or login whit external count
     *
     *
     * @param $provider
     * @return redirect('name')->with('success/error','message');
     */
    public function authUserOauth($provider){


        $user = Socialite::driver($provider)->user();

        $user_email = $user->email;

        /*
        * We check if the mail is stored in the database with the same provider
        */
        $checkMailoauth = Service_oauth::where('mail',$user_email)
            ->where('provider_label',$provider)->first();

        /*
         * If the user it's already logged in it means that he want's to add an account.
         * Then we make a little autentification check
        */
        if(Auth::check()){

        $user_id = Auth::user()->id;

        $userRole = User::where('id', '=', $user_id)->get(['role_id']);
            /*
             * We check if the user is stored in the database with the same provider
             */
            $checkUserAuth = Service_oauth::where('user_id',$user_id)
                ->where('provider_label',$provider)->first();

        if(!$checkMailoauth){
          if($checkUserAuth){

           $oauthObjectModel = Service_oauth::find($checkUserAuth->id);

           $oauthObjectModel->mail = $user->email;

           if($oauthObjectModel->save()){

               if ($userRole[0]['role_id'] > 1) {
                   return redirect('/admin/profile/')->with('success','S\'han actualitzat les dades de l\'usuari.');
               }else{
                   return redirect('/user/profile/')->with('success','S\'han actualitzat les dades de l\'usuari.');
               }
           }
          }else{
           $vinculation = Service_oauth::create([
               'provider_label' => $provider,
               'mail' => $user->email,
               'user_id' => $user_id,
           ]);
           if($vinculation){
               if ($userRole[0]['role_id'] > 1) {
                   return redirect('/admin/profile/')->with('success','S\'han creat les dades de vinculaci?? l\'usuari.');
               }else{
                   return redirect('/user/profile/')->with('success','S\'han creat les dades de vinculaci?? l\'usuari.');
               }
           }
       }
        }else{
            if ($userRole[0]['role_id'] > 1) {
                return redirect('/admin/profile/')->with('error','No s\'han creat les dades de vinculaci?? l\'usuari. El email ja est?? vinculat amb aquesta un altre compte');
            }else{
                return redirect('/user/profile/')->with('error','No s\'han creat les dades de vinculaci?? l\'usuari. El email ja est?? vinculat amb aquesta un altre compte');
            }
        }
        }else{
            if($checkMailoauth){
                Auth::loginUsingId($checkMailoauth->user_id);
                return redirect('/');
            }
            else{
                return redirect('login')->with('error','El email no est?? vinculat amb aquest cap proveidor de correus');
            }
        }
    }

    /**
     * Redirect whit a selected provider
     *
     *
     * @param $provider
     * @return Laravel\Socialite\Facades\Socialite;
     */
    public function redirectProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
}
