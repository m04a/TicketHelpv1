<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users['users'] = User::paginate(10)
        ->through(fn ($item) => [
            "id"=> $item->id,
            "username" => $item->username,
            "email" => $item->email,
            "role_name" => $item->role->label
        ]);
        
        // dd($users);die();

        return view('admin.users.index', $users); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        /*Obtain the user currently logged*/
        // $user->id = Auth::user()->id;

        if($user->save()){
            return back()->with('success',"Usuari creat correctament");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        //$idUser = $request->user()->id;
        $users = User::findOrFail($id);
        return view('admin.users.edit', ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        /*Records to update with the request*/
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        if($user->save()){
            return back()->with('success','S\'han actualitzat les dades de l\'usuari.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
