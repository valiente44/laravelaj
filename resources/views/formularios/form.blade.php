@extends('theme.base')

@section('form')
     
        <div class="container">
    

            @if (isset($event))
            <h1 class="text-center">Editar Evento</h1>
            @else
            <h1 class="text-center">Crear Evento</h1>
            @endif

            @if (isset($event))
                  <form action="{{ route('event.update', $event)}}" method="post" enctype="multipart/form-data">
                     @method('PUT')
            @else
                 <form action="{{ route('event.store')}}" method="post" enctype="multipart/form-data">
            @endif
                   
                   
         {{-- <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data"> --}}
          
        @csrf                

            {{-- Titulo del evento --}}
            <div class="mb">

                <label for="name" class="form-label">Titulo del Evento</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="nombre del cliente" required value="{{old('name') ?? @$event->name}}">
                @error('name')
                <p class="form-text">{{ $message }}</p>
                @enderror
              
            </div>

            {{-- @if (isset($client))
            <h1 class="text-center">Editar cliente</h1>
            @else
            <h1 class="text-center">Crear cliente</h1>
            @endif --}}

            <div class="mb">
                <label for="category" class="form-label">Seleciona la Categoria del Evento</label>
                
                @if (isset($event))

                   <select  name="category_id" >
                
                    @foreach ($categories as $category)

               
                    <option id="category_id" value="{{$category->id}}" 
                    @if ($event->category_id == $category->id)
                    selected      
                     @endif
                     >{{$category->title}}</option>
                        
              
                    @endforeach
        
                  </select>
   

                @else
                  
                <select  name="category_id" >
                
                    @foreach ($categories as $category)
                
                    <option id="category_id" value="{{$category->id}}">{{$category->title}}</option>
                 
                    @endforeach
        
                  </select>

                @endif

             
    
                <p class="form-text">Seleciona la categoria</p>
                @error('category_id')
                <p class="form-text">{{ $message }}</p>
                @enderror
    
            </div>

            {{-- @if (isset($event))

            @else --}}
            {{-- TO DO --}}
            @if (isset($event))
            <div class="mb">
                <label for="avatar">Imagen evento:</label>
                <input type="file" name="img" id="img">
                <br>
                <img src="http://localhost:8000/storage/{{$event->img}}" style="widht:100px !important; height:100px !important;" alt="">
                @error('img')
                <p class="form-text">{{ $message }}</p>
                @enderror
                {{-- <input type="file" id="avatar" name="avatar"accept="image/png, image/jpeg"> --}}
            </div>
            @else
            <div class="mb">
                <label for="avatar">Imagen evento:</label>
                <input type="file" name="img" id="img" value="{{old('img') ?? @$event->img}}">
                @error('img')
                <p class="form-text">{{ $message }}</p>
                @enderror
                {{-- <input type="file" id="avatar" name="avatar"accept="image/png, image/jpeg"> --}}
            </div>

            @endif
            
            @if (isset($event))

            <div class="mb">
                <label for="zone" class="form-label">Zona del evento</label>
                
                <select name="zone_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach ($zones as $zone)
                
                    <option id="zone_id" value="{{$zone->id}}"
                        @if ($event->zone_id == $zone->id)
                        selected      
                         @endif
                        >{{$zone->zone_name}}</option>
                 
                    @endforeach
                  </select>
               
                <p class="form-text">Seleciona la zona</p>
                @error('zone_id')
                <p class="form-text">Seleciona la zona{{ $message }}</p>
                @enderror
                </div>
                        
            @else

            <div class="mb">
                <label for="zone" class="form-label">Zona del evento</label>
                
                <select name="zone_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach ($zones as $zone)
                
                    <option id="zone_id" value="{{$zone->id}}">{{$zone->zone_name}}</option>
                 
                    @endforeach
                  </select>
               
                <p class="form-text">Seleciona la zona</p>
                @error('zone_id')
                <p class="form-text">Seleciona la zona{{ $message }}</p>
                @enderror
                </div>




            @endif

            <div class="mb">
                <label for="fecha_inicio">Fecha de inicio: </label>
                <input id="fecha_inicio" name="fecha_inicio" type="date" value="{{old('fecha_inicio') ?? @$event->fecha_inicio}}">
                @error('fecha_inicio')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb">
                <label for="fecha_final">Fecha de final: </label>
                <input id="fecha_final" name="fecha_final" type="date" value="{{old('fecha_inicio') ?? @$event->fecha_inicio}}">
                @error('fecha_final')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb">
                <label for="hora_inicio">Hora inicio: </label>
                <input type="time" id="hora_inicio" name="hora_inicio" required value="{{old('hora_inicio') ?? @$event->hora_inicio}}">
                @error('hora_inicio')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb">
                <label for="hora_fin">Hora  fin: </label>
                <input type="time" id="hora_fin" name="hora_fin" required  value="{{old('hora_fin') ?? @$event->hora_fin}}">
                @error('hora_fin')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>

     
            <div class="mb">
               <label for="description" class="form-label">Descripcion</label>
                <textarea id="description" name="description" value="{{old('description') ?? @$event->description}}" cols="30" rows="4" class="form-control">{{@$event->description}}</textarea>
                <p class="form-text">Escribe la descripcion</p>
                @error('description')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb py-3">
                <label for="capacity">Capacity: </label>
                <input id="capacity" name="capacity"  type="number" value="{{old('capacity') ?? @$event->capacity}}" >
                @error('capacity')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb py-3">
                <label for="price">Precio: </label>
                {{--  --}}
                <input id="price" name="price"  type="number" value="{{old('price') ?? @$event->price}}" step="0.01">
                @error('price')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>
            <br>

            @if (isset($event))
            <div class="mb">
                <button type="submit" class="btn btn-info">Actualiza Evento</button>
                {{-- <input type="hidden" name="_method" value="PUT">      --}}
            </div>
            @method('PUT')
            @else
        
            <div class="mb">
                <button type="submit" class="btn btn-info">Añade Evento</button>
                {{-- <input type="hidden" name="_method" value="PUT">      --}}
            </div>
            @endif



        
              
       
       
        </form>
        
        </div>
            
 @endsection