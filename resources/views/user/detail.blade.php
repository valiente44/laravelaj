@extends('theme.base')
@section('userProfile')
   
<h1>{{$user->name}}</h1>
<p>{{$user->surname}}</p>

<p>{{$user->dni}}</p>
    
@endsection