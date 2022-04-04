<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users['users'] = User::orderBy('created_at', 'DESC')
        ->paginate(10)
        ->through(fn ($item) => [
            "id"=> $item->id,
            "username" => $item->username,
            "email" => $item->email,
            "role_name" => $item->role->label
        ]);

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
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make(str_random(10));
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
    public function show(Request $request)
    {
        //
        $idUser = $request->user()->id;

        $users = User::where('id', '=', $idUser)->get();

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            return view('admin.profile.index' , ['users' => $users]);
        } else {
            return view('user.profile.index' , ['users' => $users]);
        }
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
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        /*Records to update with the request*/
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

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
        $user = User::findOrFail($id);
        
        $result = $user->delete();
        
        if ($result) {
            return redirect('admin/users')->with('success', "Usuari esborrat!");
        }
    }

    public function graph2()
    {
        $role = Role::withCount('users')->get();
        $counter = 0;
        $roleData = [];
        foreach ($role as $device){
         $roleData[$counter]['name'] = $role[$counter]['label'];
         $roleData[$counter]['value'] = $role[$counter]['users_count'];
         $counter++;
        }
        return json_encode($roleData);
    }
}
