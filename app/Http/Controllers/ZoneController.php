<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;
use App\Models\Zone;
use App\Models\Breakdown;
use App\Models\Question;
use App\Models\Message;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $data['zones'] = Zone::orderBy('created_at', 'DESC')
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "label" => $item->label,
                "description" => $item->description
              ]);
                return view('admin.zones.index', $data);
        }else{
            $data['zones'] = Zone::where('user_id', '=', $idUser)
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "name" => $item->name,
              ]);
                return view('user.zones.list', $data);
        }

        $data['zonesCount'] = Zone::count();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/zones/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneRequest $request)
    {
        $zone = new Zone();

        $zone->label = $request->name;
        $zone->description = $request->description;

        if($zone->save()){
            return back()->with('success',"S'han creat la seva zona satisfactoriament");
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
        $zone = Zone::findOrFail($id);

        return view('admin.zones.view', ['zones' => $zone]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $zone = Zone::findOrFail($id);

            return view('admin.zones.edit', ['zone' => $zone]);

        }else{

            $zone = Zone::findOrFail($id);

            return view('user.zones.edit', ['zone' => $zone]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneRequest $request, $id)
    {
        //
        $zone = Zone::find($id);
        /*Records to update with the request*/
        $zone->label = $request->name;
        $zone->description = $request->description;

        if($zone->save()){
            return back()->with('success','S\'han actualitzat les dades de la zona!');
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
        $zone = Zone::find($id);

        if($zone->delete()){
            return back()->with('success',"S'ha esborrat la seva zona satisfactoriament");
        }

        return redirect(route("admin.zones.index")); 
    }

    public function history($id){
        $history['history'] = Breakdown::where('zone_id', $id)
        ->orderBy('created_at', 'DESC')
        ->paginate(10, ["*"], "history")
        ->through(fn ($item) => [
            "id" => $item->id,
            "title" => $item->title,
            "status" => $item->status,
            "username" => $item->user->username,
            "department" => $item->department->name,
            "aula" => $item->zone->label,
            "manager" => optional($item->manager)->username
        ]);
        return view('admin.zones.history',$history);
    }

    public function showbreakdown($id)
    {
        $breakdownData = Breakdown::findOrFail($id);

        $breakdown = [
                "id" => $breakdownData->id,
                "title" => $breakdownData->title,
                "status" => $breakdownData->status,
                "description" => $breakdownData->description,
                "username" =>$breakdownData->user->username,
                "departament" =>$breakdownData->department->name,
                "zone_name" =>$breakdownData->zone->label,
                "device_name" =>$breakdownData->device->label,
                "zone_id" =>$breakdownData->zone_id
        ];
    
        if (isset($breakdownData->manager_id)) {
            $breakdown["manager_username"] = $breakdownData->manager->username;
        } else {
            $breakdown["manager_username"] = "No assignat";
        }
        $messages = Message::where('breakdown_id', $breakdown['id'])->get()
        ->map(fn ($item) => [
            'id' => $item->id,
            'content' => $item->content,
            'user' => $item->user->username,
        ]);
        return view('admin.zones.view')
        ->with('breakdown', $breakdown)
        ->with('messages', $messages);
    }
}
