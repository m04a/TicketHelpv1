<?php

namespace App\Http\Controllers;

use App\Models\Service_oauth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OauthController extends Controller
{
    public static function store($user,$provider){

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
               dd("Saved data");
           }
          }else{
           $vinculation = Service_oauth::create([
               'provider_label' => $provider,
               'mail' => $user->email,
               'user_id' => $user_id,
           ]);

           if($vinculation){
            dd("Created new Oauth");
           }
       }
        }else{
            dd("Mail already exists in the database");
        }
    }
}
