<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Models\User;
use App\Models\Device;
use App\Models\Role;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $data['types'] = Type::orderBy('created_at', 'DESC')
            ->paginate(5)
            ->through(fn ($item) => [
              "id" => $item->id,
              "label" => $item->label,
              "description" => $item->description
              ]);
                return view('admin.types.index', $data);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        //

        $types = new Type;

        $types->label=$request->label;
        $types->description=$request->description;

        if($types->save()){
            return redirect("/admin/types")->with('success', "El Tipus de dispositiu s'ha creat correctament");
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
        $types = Type::findOrFail($id);

        return view('admin.types.view', ['types' => $types]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $types = Type::findOrFail($id);

        return view('admin.types.edit', ['types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        //
        
        $types = Type::findOrFail($id);

        $types->label = $request->label;
        $types->description = $request->description;

        if($types->save()){
            return back()->with('success', "s'ha actualizat les dades correctament");
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
        $types = Type::findOrFail($id);
        
        $result = $types->delete();
        
        if ($result) {
            return redirect('admin/types')->with('success', "Tipus de dispositiu esborrat!");
        }
    }

    /**
     * Retun values in json array for Angular graphic. 
     *
     * 
     * 
     * @return @return json_encode($array)
     */
    public function graph6(){

        $devices = Type::withCount('devices')->get();
        $counter = 0;
        $deviceData = [];
        foreach ($devices as $device){
         $deviceData[$counter]['name'] = $devices[$counter]['label'];
         $deviceData[$counter]['value'] = $devices[$counter]['devices_count'];
         $counter++;
        }
        return json_encode($deviceData);
     }
}
