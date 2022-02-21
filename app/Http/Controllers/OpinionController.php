<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Http\Requests\StoreOpinionRequest;
use App\Http\Requests\UpdateOpinionRequest;
use Illuminate\Support\Facades\Session;

class OpinionController extends Controller
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
     * @param  \App\Http\Requests\StoreOpinionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOpinionRequest $request)
    {

     
        $request->validate([
            'opinion_text' => 'required',
            'rating' => 'required|Integer',
         
            
        ]);

            
            
       

        Opinion::create([
            'opinion_text' => $request->input('opinion_text'),
            'rating' => $request->input('rating'),
            'user_id' => $request->input('user_id'),
            'event_id' => $request->input('event_id'),
            
        ]);


        
        return redirect()->back()->with('message','Reseña creada');  
        // return view('admin.events',['events' =>$events]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOpinionRequest  $request
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpinionRequest $request, Opinion $opinion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        //
    }
}
