<?php

namespace App\Http\Controllers;

use App\Models\Event_Zone;
use App\Http\Requests\StoreEvent_ZoneRequest;
use App\Http\Requests\UpdateEvent_ZoneRequest;

class EventZoneController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvent_ZoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_ZoneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_Zone  $event_Zone
     * @return \Illuminate\Http\Response
     */
    public function show(Event_Zone $event_Zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_Zone  $event_Zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_Zone $event_Zone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_ZoneRequest  $request
     * @param  \App\Models\Event_Zone  $event_Zone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_ZoneRequest $request, Event_Zone $event_Zone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_Zone  $event_Zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_Zone $event_Zone)
    {
        //
    }
}
