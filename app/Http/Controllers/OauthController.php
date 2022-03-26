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

        $oauth = Service_oauth::where('user_id',$user_id)
        ->where('provider_label',$provider)->first();
       if($oauth){
           $oauthObjectModel = Service_oauth::find($oauth->id);

           $oauthObjectModel->mail = $user->email;
           if($oauthObjectModel->save()){

           }else{
                dd('lol');
           }
       }else{
           $vinculation = Service_oauth::create([
               'provider_label' => $provider,
               'mail' => $user->email,
               'user_id' => $user_id,
           ]);
           if($vinculation){
               return view('admin.profile.index')->with('success',"S'han afegit la teva vinculació amb -> $provider");
           }else{
               dd("hola");
           }
       }
        $idUser = Auth::user()->id;

        $users = User::where('id', '=', $idUser)->get();

        return view('admin.profile.index' , ['users' => $users]);
    }
}
