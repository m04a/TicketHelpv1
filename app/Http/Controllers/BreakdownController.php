<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class BreakdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // $userid = $breakdown['breakdown']->user_id;
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);
        $breakdown['breakdownOn'] = Breakdown::where('status', 1)
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "status" => $item->status,
                "username" => $item->user->username,
                "department" => $item->department->name,
                "manager" => $item->manager->username
            ]);
        $breakdown['breakdownOff'] = Breakdown::where('status', 0)
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "status" => $item->status,
                "username" => $item->user->username,
                "department" => $item->department->name,
                "manager" => $item->manager->username
            ]);

        if ($userRole[0]['role_id'] > 1){
            return view('admin.breakdowns.index',$breakdown);
        }else{
            return view('user.breakdowns.list',$breakdown);
        }
            //dd($breakdown);
    }

    public function filter(){

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breakdownData = Breakdown::where('id', $id)->first();

        $breakdownData['username'] = $breakdownData->user->username;

        $breakdownData['departament'] = $breakdownData->department->name;

        return view('admin.breakdowns.view')->with('breakdownData',$breakdownData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breakdownData = Breakdown::where('id', $id)->first();

        $breakdownData['username'] = $breakdownData->user->username;

        $breakdownData['departament'] = $breakdownData->department->name;

        $department = Department::all();

        return view('admin.breakdowns.edit',['department' => $department])->with('breakdownData',$breakdownData);
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
        //
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
