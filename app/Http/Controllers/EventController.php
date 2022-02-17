<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Zone;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        
        $events = Event::all();
        switch ($request->counter) {
            case 0:
                return view('admin.events',['events' =>$events]);
                break;
            case 1:
                return view('eventos.index',['events' =>$events]);
                break;
    
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        $category=Category::all();
        return view('formularios.form',['categories' =>$category , 'zones'=>$zones]);
        // return $zones .','. $category;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            // 'hora_inicio' => 'required|date_format:H:i',
            // 'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'description' => 'required',
            'price' => 'required',
            'capacity' => 'required|integer',
            'category_id' => 'required',
            'zone_id' => 'required',
            
        ]);

              // cache the file
              $file = $request->file('img');

              // generate a new filename. getClientOriginalExtension() for the file extension
              $filename = 'event-photo-' . time() . '.' . $file->getClientOriginalExtension();
      
              // save to storage/app/photos as the new $filename
              $path = $file->storeAs('public', $filename);
              // $path = $file->storeAs('public', $filename);

        Event::create([
            'name' => $request->input('name'),
            'img' =>  $filename,
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_final' => $request->input('fecha_final'),
            'hora_inicio' => $request->input('hora_inicio'),
            'hora_fin' => $request->input('hora_fin'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'capacity' => $request->input('capacity'),
            'category_id' => $request->input('category_id'),
            'zone_id' => $request->input('zone_id'),
        ]);

        // $event = Event::create($request->only('name','img'));
        $events = Event::all();
        return view('admin.events',['events' =>$events]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('eventos.detail')
        ->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $events = Event::all();
        // return view('admin.events',['events' =>$events]);
      
        $evento = Event::find($id);
        
        $categories = Category::select('id','title')->get();

        $zonas = Zone::all();
        
        return view('formularios.form',['categories' =>$categories],['zones' =>$zonas])
        ->with('event', $evento);
        


        // return view('formularios.form')
        // ->with('evento', $evento);

        // return view('formularios.form',['categories' =>$categories],['zones' =>$zonas],['event',$evento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
  
        $request->validate([
            'name' => 'required',
            // 'img' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'description' => 'required',
            'price' => 'required',
            'capacity' => 'required|integer',
            'category_id' => 'required',
            'zone_id' => 'required',
            
        ]);

            
            
       

        $event -> name = $request['name'];
        
        if($request['img'] ==  $event -> img || $request['img'] == null ){

        }else{
            // cache the file
            $file = $request->file('img');

            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'event-photo-' . time() . '.' . $file->getClientOriginalExtension();
            // $event -> img ->delete();
            $event -> img = $filename;
            // save to storage/app/photos as the new $filename
            $path = $file->storeAs('public', $filename);
            // $path = $file->storeAs('public', $filename);
        }
 
        $event -> fecha_inicio = $request['fecha_inicio'];
        $event -> fecha_final = $request['fecha_final'];
        $event -> hora_inicio = $request['hora_inicio'];
        $event -> hora_fin = $request['hora_fin'];
        $event -> description = $request['description'];
        $event -> price = $request['price'];
        $event -> capacity = $request['capacity'];
        $event -> category_id = $request['category_id'];
        $event -> zone_id = $request['zone_id'];
        
      
    
        $event->save();
        // return dd($event);

        Session::flash('mensaje', 'evento editado exitosamente');
        $events = Event::all();
        return view('admin.events',['events' =>$events]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //to do
        $event->delete();
        Session::flash('mensaje', 'evento eliminado');
        $events = Event::all();
        return view('admin.events',['events' =>$events]);
    }
}
