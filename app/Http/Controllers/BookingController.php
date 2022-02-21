<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
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
    public function create(Event $event)
    {
        return dd($event);

        // return view('booking.reserva',['event'=>$event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request , Booking $reserva)
    {
        $request -> validate([
            'tickets' => 'required|integer|between:1,5',
         ]);
        //  ::where('id', $id);

        // $reserva -> event_id
    
        //  if($reserva->user){
      
        //  }
        //  return dd($request->user_id);
        // if($request->user_id )
        
        $bookings = Booking::where('event_id', '=' , $request->event_id)->get()->sum('tickets');
    

        $capacity  = DB::table('events')->where('id',$request->event_id)->value('capacity');
       
        $ticketsCliente = $request -> tickets; 

        if($ticketsCliente + $bookings <= $capacity){
     
            $reserva -> tickets = $request['tickets'];
            $reserva -> paid =false;
            $reserva -> user_id = $request['user_id'];
            $reserva -> event_id = $request['event_id'];
            $reserva->save();
            //to do
            //meter un sesion flash
            // Session::flash('mensaje', 'registro creado con exito');
 

            //to do que devuelva el perfil
            // return view('category.index');
            // Session::flash('mensaje', 'registro creado con exito');
            // return Redirect::back()->withErrors(['msg' => 'The Message']);

            return redirect()->back()->with('message','Has reservado con exito');   
            // return redirect()->route('event.index')->with('message','Your message has been sent!');
            // return redirect('contactform/')->with('message','Your message has been sent!');
   
            // return ("Puedes comprar");
        }else{
            return redirect()->back()->with('message','No quedan entradas');   
            // return ("No puedes comprar");
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('message','Reserva eliminada');  
              
    }
}
