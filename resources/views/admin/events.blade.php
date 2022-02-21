@extends('theme.base')

@section('eventsAdmin')
@if(Auth::check())

@if (Auth::user()->user_types==1)

@if (session('message'))
  <div class="message-has-been-sent-confirmation">
      {{ session('message') }}
  </div>
@endif


<div class="container py-2">
    <h1 class="text-center">Listado de Eventos!</h1>
    
    <table class="table table-striped" style="width:100%">
        @foreach ($events as $event)
        <thead>
            <tr><th>Titulo del evento</th>
            <th>Foto</th>
            <th>Fecha evento</th>
            <th>Zona</th>
            <th>Capacidad</th>
            <th>Acciones</th>
        </tr></thead>
        <tbody>
                <tr>
                <td>{{$event->name}}</td>
                <td><img src="http://localhost:8000/storage/{{$event->img}}" style="widht:50px !important; height:50px !important;"></td>
                <td>{{$event->fecha_inicio}} / {{$event->fecha_final}}</td>
                <td>{{$event->zone->zone_name}}, {{$event->zone->adress}}, {{$event->zone->surface}}</td>
                <td>{{$event->capacity}}</td>
                <td>
                    <form action="{{route('event.edit',[$event->id])}}" method="POST" class="d-inline">
                        @method('GET')
                        @csrf
                        <button type="submit" class="btn btn-warning">Edit</button>               
                       </form>

                    {{-- <a href="http://localhost:8000/client/6/edit" class="btn btn-warning">Editar</a> --}}

                    <form action="{{route('event.destroy',[$event->id])}}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>               
                       </form>


                    <a href="{{route('event.show',[$event->id])}}" class="btn btn-info">Ver</a>
                    {{-- http://localhost:8000/client/9/edit --}}
                </td>
                </tr>
                
                
                          
        </tbody>
        @endforeach
    </table>

             
          

</div>


@endif

@else
NO TIENES PERMISOS
@endif









@endsection