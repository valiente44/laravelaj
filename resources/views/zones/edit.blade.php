@extends('theme.base')

@section('editZone')

@if(Auth::check())

@if (Auth::user()->user_types==1)

@if (session('message'))
<div class="alert alert-primary" role="alert">
    {{ session('message') }}
</div>
@endif

<form action="{{route('zone.update',[$zone->id])}}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <input type="text" id="zone_name" name="zone_name" value="{{$zone->zone_name}}">
        @error('zone_name')
        <p class="form-text">Escribe el nombre de la zona{{ $message }}</p>
        @enderror

        <input type="text" id="adress" name="adress" value="{{$zone->adress}}">
        @error('adress')
        <p class="form-text">Escribe el address de la zona{{ $message }}</p>
        @enderror

        <input type="text" id="surface" name="surface" value="{{$zone->surface}}">
        @error('surface')
        <p class="form-text">Escribe el surface de la zona{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-info">editar Zona</button>
      
    </div>           
</form>


@endif
@else
{{-- HACER REDIRECT --}}
NO TIENES PERMISOS
@endif

@endsection