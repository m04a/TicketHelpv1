<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Type;
use App\Models\Zone;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['devices'] = Device::paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "label" => $item->label,
                //"label" => substr($item->label, 0, 1) . "-" . str_pad($item->zone_id, 2, 0, STR_PAD_LEFT) . "-" . str_pad($item->type_id, 2, 0, STR_PAD_LEFT),
                "zone" => $item->zone->label,
                "type" => $item->type->label,
            ]);
        return view('admin.devices.index', $data);

        //$data['devicesCount'] = Device::count();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $value = $request->session()->pull('DeviceStore');
        $list = [
            "types" => Type::all(),
            "zones" => Zone::all(),
            "message" => $value
        ];
        return view('admin.devices.create', $list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'token' => ['nullable'],
            'name' => ['required', 'string', 'min:3', 'max:120'],
            'type' => ['required', 'integer'],
            'zone' => ['required', 'integer'],
        ], [
            'title.required' => 'Et faltat el nom',
            'type.required' => 'Tipus no seleccionat, ¿com ho has aconseguit?',
            'zone.required' => 'Aula sense seleccionar'
        ]);
        $device = new Device;
        $device->label=$input['name'];
        $device->type_id=$input['type'];
        $device->zone_id=$input['zone'];
        $result=$device->save();
        if ($result) {
            return redirect('/admin/devices/create')->with('success', "El dispositiu s'ha creat correctament");
        } else {
            return redirect('/admin/devices/create')->with('message', "Hi ha hagut algun error");
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
    public function edit($id)
    {
        //
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
        $Device = Device::findOrFail($id);
        $result = $Device->delete();

        if ($result) {
            return redirect('/admin/devices')->with('message', 'Dispositiu esborrat!');
        } else {
            return redirect('/admin/devices')->with('message', 'hi hagut un error al esborrar el dispositiu!');
        }
    }
}
