@extends('theme.base')
@section('userProfile')
@if(Auth::check())

@if (session('message'))
<div class="alert alert-primary" role="alert">
    {{ session('message') }}
</div>
@endif
<form action="{{route('user.edit',[$user])}}" method="GET">
    @method('GET')
    @csrf
<div class="container py-2">
    <h1 class="text-center">Informació del teu usuari</h1>
    <h1 class="text-center">Benvingut {{$user->name}} {{$user->sur_name}}</h1>

    <table class="table table-striped">
        <thead>
            <tr><th>Nom</th>
            <th>Cognom</th>
            <th>DNI</th>
            <th>Codi postal</th>
            <th>Telèfon</th>
            <th>Editar</th>
        </tr></thead>
        <tbody>
                <tr>
                <td class="text-center">{{$user->name}}
                    <input type="text" id="name" name="name" value="{{$user->name}}">
                    @error('name')
                    <p class="form-text">Nombre: {{ $message }}</p>
                    @enderror
                </td>
                <td class="text-center">{{$user->sur_name}}
                    <input type="text" id="sur_name" name="sur_name" value="{{$user->sur_name}}">
                    @error('sur_name')
                    <p class="form-text">Escribe tu sur_name{{ $message }}</p>
                    @enderror
                </td>
                <td class="text-center">{{$user->dni}}
                    {{-- <input type="text" id="dni" name="dni" value="{{$user->dni}}">
                    @error('dni')
                    <p class="form-text">Escribe tu dni{{ $message }}</p> 
                    @enderror--}}
                </td>
                <td class="text-center">{{$user->zip_code}}
                    <input type="text" id="zip_code" name="zip_code" value="{{$user->zip_code}}">
                    @error('zip_code')
                    <p class="form-text">Escribe tu zip_code {{ $message }}</p>
                    @enderror
                </td>
                <td class="text-center">{{$user->phone}}
                    <input type="number" id="phone" name="phone" value="{{$user->phone}}">
                    @error('phone')
                    <p class="form-text">Escribe tu phone{{ $message }}</p>
                    @enderror
                </td>
                <td>
                    
                    <button type="submit" class="btn btn-info active">Actualizar</button>
                    </td>
                </div>           
                </form> 
            </td>
                    {{-- <form action="{{route('user.edit',[$user->id])}}" method="POST" class="d-inline">
                        @method('GET')
                        @csrf
                        <button type="submit" class="btn btn-warning active">Edita</button>               
                       </form> --}}

                    {{-- <a href="http://localhost:8000/client/6/edit" class="btn btn-warning">Editar</a> --}}

                    {{-- <form action="{{route('user.destroy',[$user->id])}}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger active">Esborra</button>               
                       </form> --}}


                    {{-- <a href="{{route('user.show',[$event->id])}}" class="btn btn-info">Ver</a> --}}
                    {{-- http://localhost:8000/client/9/edit --}}
                
                </tr>
                
                
                          
        </tbody>
    
    </table>

             
          

</div>


{{-- <h1>{{$user->name}}</h1>
<p>{{$user->surname}}</p>

<p>{{$user->dni}}</p>


@if (session('message'))
<div class="alert alert-primary" role="alert">
    {{ session('message') }}
</div>
@endif
<form action="{{route('user.edit',[$user])}}" method="GET">
    @method('GET')
    @csrf
    <div>

        <input type="text" id="name" name="name" value="{{$user->name}}">
        @error('name')
        <p class="form-text">Nombre: {{ $message }}</p>
        @enderror

        <input type="text" id="sur_name" name="sur_name" value="{{$user->sur_name}}">
        @error('sur_name')
        <p class="form-text">Escribe tu sur_name{{ $message }}</p>
        @enderror

        <input type="text" id="zip_code" name="zip_code" value="{{$user->zip_code}}">
        @error('zip_code')
        <p class="form-text">Escribe tu zip_code {{ $message }}</p>
        @enderror

        <input type="number" id="phone" name="phone" value="{{$user->phone}}">
        @error('phone')
        <p class="form-text">Escribe tu phone{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-info">Actualizar</button>
      
    </div>           
</form> --}}


    
@foreach ($user->bookings as $booking)

    
<div class="container py-2">
    <h1 class="text-center">Tikets dels teus esdeveniments</h1>

    <table class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Esdeveniment</th>
                <th>Tickets comprats</th>
            </tr>
        </thead>
        <tbody>
            <tr>
           
                <td>{{$booking->event->name}}</td>
                <td>{{$booking->tickets}}</td>
                <td>     
                    <form action="{{route('booking.destroy',[$booking])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger active">Delete</button>               
                    </form>
                </td>




                
                {{-- <td>{{$evento[0]->name}}</td> --}}
            </tr>

        </tbody>

    </table>
    {{-- <p>{{$booking->id}}</p> --}}
</div>
@endforeach
@else
{{-- HACER REDIRECT --}}
NO ESTAS LOGEADO
@endif
    
@endsection