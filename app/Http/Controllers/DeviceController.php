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
    public function index()
    {

        $devices = Device::paginate(10)
            ->through(fn ($item) => [
                "label" => $item->label,
                //"label" => substr($item->label, 0, 1) . "-" . str_pad($item->zone_id, 2, 0, STR_PAD_LEFT) . "-" . str_pad($item->type_id, 2, 0, STR_PAD_LEFT),
                "zone" => $item->zone->label,
                "type" => $item->type->label,
            ]);
        return view('admin.devices.index', $devices);

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
            "types" => Type::pluck('label', 'id'),
            "zones" => Zone::pluck('label', 'id'),
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
        //
    }
}
