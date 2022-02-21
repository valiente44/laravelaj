@extends('theme.base')

@section('zonesIndex')
@if(Auth::check())

@if (Auth::user()->user_types==1)

<div class="container ">
    <div class="row ">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif


        <form action="{{route('zone.store')}}" method="POST">
 
            @csrf
            <div>
                <input type="text" id="zone_name" name="zone_name" value="zone_name">
                @error('zone_name')
                <p class="form-text">Escribe el nombre de la zona{{ $message }}</p>
                @enderror

                <input type="text" id="adress" name="adress" value="adress">
                @error('adress')
                <p class="form-text">Escribe el address de la zona{{ $message }}</p>
                @enderror

                <input type="text" id="surface" name="surface" value="surface">
                @error('surface')
                <p class="form-text">Escribe el surface de la zona{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-info">Crear Zona</button>
              
            </div>           
        </form>
 
    </div>
    <div class="row py-2">
        <div class="center">
            <table class="table">
                <thead>
                    <th>zone name:</th>
                    <th>adress</th>
                    <th>surface</th>
                </thead>
            @foreach ($zones as $zone)
                <tr> 

                    <td>{{$zone->zone_name}}</td>
                    <td>{{$zone->adress}}</td>
                    <td>{{$zone->surface}}</td>
                    <td>
                
                    <form action="{{route('zone.destroy',[$zone->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>               
                       </form>
                    </td>
                    <td>
                    <form action="{{route('zone.edit',[$zone->id])}}" method="POST">
                        @method('GET')
                            @csrf
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                    </td>
                </tr>
                
            @endforeach

            </table>

        </div>
      
    </div>    
    @endif
    @else
    {{-- HACER REDIRECT --}}
    NO TIENES PERMISOS
    @endif
</div>

    
@endsection