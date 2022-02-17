@extends('theme.base')

@section('detailEvent')
<h1>{{$event->name}}</h1>
<img  src="http://localhost:8000/storage/{{$event->img}}" style="widht:100px !important; height:100px !important;" alt="">
<br>
Del {{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}} Horario: {{date('h:i A', strtotime($event->hora_inicio))}} - {{date('h:i A', strtotime($event->hora_fin))}} 
<p>{{$event->description}}</p>
<p>{{$event->price}}</p>
<p>{{$event->capacity}}</p>
<p>zona: {{$event->zone->zone_name}}</p>

@if (session('message'))
  <div class="alert alert-primary" role="alert">
      {{ session('message') }}
  </div>
@endif

@if (Auth::check())
    
    <form action="{{ route ('booking.store')}}" method="POST">
        
            @csrf
            <label for="tickets">Quantes entrades vols: </label>
            <input type="number" id="tickets" name="tickets"  min="1" max="5">
            @error('tickets')
            <p class="form-text">{{ $tickets }}</p>
            @enderror

            <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
            <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">

            <button type="submit" class="btn btn-info">Reserva</button>


    </form> 
@endif
    {{-- <form action="{{ route('booking.create', $event->id)}}" method="GET"> --}}
    
        {{-- <div class="mb"> --}}
            {{-- <button type="submit" class="btn btn-info">Reservar Evento</button> --}}
                {{-- <input type="hidden" name="_method" value="PUT">      --}}
         {{-- </div> --}}
            
    
    {{-- </form> --}}



@endsection

