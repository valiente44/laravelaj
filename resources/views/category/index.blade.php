@extends('theme.base')



@section('categoryIndex')

@if(Auth::check())

@if (Auth::user()->user_types==1)


<div class="container">
    <div class="row ">

    
        <form action="{{route('category.store')}}" method="POST">
 
            @csrf
            <div>
                <input type="text" id="title" name="title" value="title">
                <button type="submit" class="btn btn-info">Crear Categoria</button>
                @error('title')
                <p class="form-text">Escribe el nombre de la categoria{{ $message }}</p>
                @enderror
            </div>           
        </form>
 
    </div>
    <div class="row py-2">
        <div class="center">
            <table class="table">
            @foreach ($categories as $category)
                <tr> 
                    <td>{{$category->title}}</td>
                    <td>
                        {{-- <form action="{{route('category.destroy',[$category->id])}}">
                        <a href="{{route('category.destroy',[$category->id])}}"><button  class="btn btn-danger" onclick="return confirm('Estas seguro de Eliminar esta categoria se borraran los eventos asociados a esta')">Eliminar</button></a>
                    </form> --}}
                    <form action="{{route('category.destroy',[$category->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>               
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
