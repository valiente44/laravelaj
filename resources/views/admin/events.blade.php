@extends('theme.base')

@section('eventsAdmin')

@if (session('message'))
  <div class="message-has-been-sent-confirmation">
      {{ session('message') }}
  </div>
@endif


<div class="container py-2">
    <h1 class="text-center">Listado de Eventos!</h1>
    
    <table class="table py-2">
        @foreach ($events as $event)
        <thead>
            <tr><th>Titulo del evento</th>
            <th>img</th>
            <th>fecha evento</th>
            <th>Acciones</th>
        </tr></thead>
        <tbody>
                <tr>
                <td>{{$event->name}}</td>
                <td>65</td>
                <td>{{$event->fecha_inicio}} / {{$event->fecha_final}}</td>
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


                    <a href="http://localhost:8000/client/9/edit" class="btn btn-info">Ver</a>

                </td>
                </tr>
                
                
                          
        </tbody>
        @endforeach
    </table>

             
          

</div>















@endsection