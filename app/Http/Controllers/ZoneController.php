<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;
use App\Models\Zone;
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
            $data['zones'] = Zone::paginate(10)
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
    public function store(Request $request)
    {
        $zone = new Zone();

        $zone->label = $request->label;
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
        //
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
