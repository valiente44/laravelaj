@extends('theme.base')

@section('indexEventos')

@foreach ($events as $event)
<a class="text-dark" href="{{route ('event.show', $event)}}" style="text-decoration: none"><div class="recycler d-inline cardEvent">
    {{-- 29 De octubre 2021 5:00 P.M - 5 de abril de 2022 --}}
    <div class="col-md-6 d-inline">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <div class="mb-1 text-muted pd-1">Del {{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}} Horario: {{date('h:i A', strtotime($event->hora_inicio))}} - {{date('h:i A', strtotime($event->hora_fin))}} </div>
                    <h3 class="mb-0">
                        {{$event->name}}
                    </h3>
                    <div class="mb-1 text-muted">{{$event->zone->zone_name}}</div>
                        {{-- <p class="card-text mb-auto">{{str_replace('\\n', '', $event->description)}}</p> --}}
                        <p class="card-text mb-auto">{{ $event->description}}</p>
                            <div class="p-3 mb-2 bg-info text-white"> 
                                @if ($event->price==0)
                                 Free
                                 @else 
                                 {{$event->price}}€
                                @endif
                                  
                            </div>
                        
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px !important; height: 200px !important; " src="http://localhost:8000/storage/{{$event->img}}" data-holder-rendered="true">
                </div>
            </div>
        </div>

    </div>

</div>
</a>
    
@endforeach

    
@endsection