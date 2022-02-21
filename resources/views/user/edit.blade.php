@extends('theme.base')

@section('userEdit')


@if (session('message'))
<div class="alert alert-primary" role="alert">
    {{ session('message') }}
</div>
@endif

<form action="{{route('user.edit',[$user])}}" method="POST">
    @method('PUT')
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
        @error('zip_code')
        <p class="form-text">Escribe tu phone{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-info">Actualizar</button>
      
    </div>           
</form>

    
@endsection