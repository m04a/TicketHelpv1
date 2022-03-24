<?php

namespace App\Http\Controllers;

use App\Http\Requests\BreakdownRequest;
use App\Models\Breakdown;
use App\Models\Device;
use App\Models\User;
use App\Models\Department;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $idUser = Auth::user()->id;

        $department = Department::all();

        $devices = Device::all();

        $zones = Zone::all();

        $manager = User::where('role_id',3)->orderBy('role_id')->get();

        $userLoggedIn = Auth::user()->username;

        if ($idUser == 3 ){
            return view('admin.breakdowns.create',
                ['department' => $department,
                    'manager' => $manager,
                    'devices' => $devices,
                    'zones' => $zones,
                ])->with('userLoggedIn',$userLoggedIn);
        }else{
            return view('user.breakdowns.create',
                ['department' => $department,
                    'manager' => $manager,
                    'devices' => $devices,
                    'zones' => $zones,
                ])->with('userLoggedIn',$userLoggedIn);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreakdownRequest $request)
    {
        $breakdown = new Breakdown();

        $breakdown->status = $request->status;
        $breakdown->title = $request->title;
        $breakdown->description = $request->description;
        $breakdown->department_id = $request->department_id;
        $breakdown->manager_id = $request->manager_id;
        $breakdown->device_id = $request->device_id;
        $breakdown->zone_id = $request->zone_id;
        /*Obtain the user currently logged*/
        $breakdown->user_id = Auth::user()->id;

        if($breakdown->save()){
            return back()->with('success',"S'han creat la seva incidencia satisfactoriament");
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

        $breakdownData = Breakdown::where('id', $id)->first();

        $breakdownData['username'] = $breakdownData->user->username;

        $breakdownData['departament'] = $breakdownData->department->name;

        $breakdownData['username'] = $breakdownData->user->username;

        $breakdownData['manager_username'] = $breakdownData->manager->username;

        $breakdownData['zone_name'] = $breakdownData->zone->label;

        $breakdownData['device_name'] = $breakdownData->device->label;

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
        $department = Department::all();

        $devices = Device::all();

        $zones = Zone::all();

        $manager = User::where('role_id',3)->orderBy('role_id')->get();

        $breakdownData = Breakdown::where('id', $id)->first();

        $breakdownData['username'] = $breakdownData->user->username;

        $breakdownData['departament'] = $breakdownData->department->name;

        return view('admin.breakdowns.edit',
            ['department' => $department,
                'manager' => $manager,
                'devices' => $devices,
                'zones' => $zones,
            ])->with('breakdownData', $breakdownData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BreakdownRequest $request, $id)
    {
        $breakdown = Breakdown::find($id);
        /*Records to update with the request*/
        $breakdown->status = $request->status;
        $breakdown->title = $request->title;
        $breakdown->description = $request->description;
        $breakdown->manager_id = $request->manager_id;
        $breakdown->device_id = $request->device_id;
        $breakdown->zone_id = $request->zone_id;
        $breakdown->department_id = $request->department_id;

        if($breakdown->save()){
            return back()->with('success',"S'han actualitzat les dades de la incidencia.");
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
        $breakdown = Breakdown::find($id);

        if($breakdown->delete()){
            return back()->with('success',"S'ha esborrat la seva incidencia satisfactoriament");
        }
    }

    public function graph1() {

        $standby = Breakdown::where("status", 1)->count();

        $inprocess = Breakdown::where("status", 2)->count();

        $resolveds = Breakdown::where("status", 3)->count();

        return response()->json([
            [
              "name" => "Resoltes",
              "value" => $resolveds
            ],
            [
              "name"=> "En proces",
              "value"=> $inprocess
            ],
            [
              "name"=> "Pendents",
              "value"=> $standby
            ],
        ]);
    }
}
