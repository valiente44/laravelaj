<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Http\Requests\StoreZoneRequest;
use App\Http\Requests\UpdateZoneRequest;
use Illuminate\Support\Facades\Session;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        // $zones = Zone::all();
        return view('zones.index',['zones' =>$zones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreZoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZoneRequest $request)
    {
        $request->validate([
            'zone_name' => 'required',
            'adress' => 'required',
            'surface' => 'required',
          
        ]);

        Zone::create([
            'zone_name' => $request->input('zone_name'),
            'adress' => $request->input('adress'),
            'surface' => $request->input('surface'),
        ]);

        $zones = Zone::all();

        return view('zone.index',['zones'=>$zones]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        return view('zones.edit',['zone' =>$zone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateZoneRequest  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZoneRequest $request, Zone $zone)
    {

        // dd($request);
        $request->validate([
            'zone_name' => 'required',
            'adress' => 'required',
            'surface' => 'required',
          
        ]);

     
        $zone -> zone_name = $request['zone_name'];
        $zone -> adress = $request['adress'];
        $zone -> surface = $request['surface'];
        
  
        $zone->save();
        // return dd($event);

    
        return redirect()->back()->with('message', 'zona editada exitosamente');   


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
     
        foreach($zone->events as $event){
            $event->delete();
        }

        $zone->delete();
        return redirect()->back()->with('message','Has eliminado con exito');   
   
     
    }
}
