<?php

namespace App\Http\Controllers;
use App\Http\Requests\DeviceRequest;
use App\Models\Breakdown;
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
        $list = [
            "types" => Type::all(),
            "zones" => Zone::all(),
        ];
        return view('admin.devices.create', $list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        $device = new Device;
        $device->label=$request->title;
        $device->type_id=$request->type;
        $device->zone_id=$request->zone;
        $result=$device->save();
        if ($result) {
            return redirect('/admin/devices/create')->with('success', "El dispositiu s'ha creat correctament");
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
        $deviceData = Device::where('id', $id)->first();
        $list = [
            "types" => Type::all(),
            "zones" => Zone::all(),
        ];

        return view('admin.devices.edit',['list' => $list])->with('deviceData',$deviceData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceRequest $request, $id)
    {
        $device = Device::where('id', $id)->first();;
        $device->label=$request->title;
        $device->type_id=$request->type;
        $device->zone_id=$request->zone;
        if ($device->save()) {
            return back()->with('success', "El dispositiu s'ha modificat correctament");
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
        $Device = Device::findOrFail($id);
        $result = $Device->delete();

        if ($result) {
            return redirect('/admin/devices')->with('success', 'Dispositiu esborrat!');
        }
    }
    public function graph4(){

       $devices = Zone::withCount('devices')->get();
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
