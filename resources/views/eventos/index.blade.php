@extends('theme.base')

@section('indexEventos')

{{-- @foreach ($events as $event) --}}
<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Els millors esdeveniments de la zona</h1>
                    <p>Busca, troba i viu els millors esdeveniments per a tu i els teus</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Categories populars </h2>
                        <ul class="list-inline">
                            <!-- <li class="list-inline-item">
                            <a href="category.html"><i class="fa fa-bed"></i> Hotel</a></li> -->
                            <li class="list-inline-item">
                                <a class="text-white"><i class="fa fa-grav text-white"></i> Esport</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white"><i class="fa fa-car text-white"></i> Motor</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white"><i class="fa fa-cutlery text-white"></i> Gastronómics</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white"><i class="fa fa-child text-white"></i> Esdeveniments per a nens</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Advance Search -->
                <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form action="{{route ('event.index')}}" method="GET">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="name" id="name" class="w-100 form-control my-2 my-lg-1" 
                                                placeholder="¿ Quin esdeveniment estas buscant ?">
                                        </div>
                                        <div class="form-group col-md-6">                                           
                                            <select class="w-100 form-control mt-lg-1 mt-md-2" name="category_id" class="w-100 form-control mt-lg-1 mt-md-2">
                                                {{-- <option>Categories</option> --}}
                                                @foreach ($categories as $category)
                                                    <option class="fa fa-cutlery"  id="category_id" value="{{$category->id}}"> {{$category->title}}</option>
                                                @endforeach                                       
                                            </select>
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                            <select class="w-100 form-control mt-lg-1 mt-md-2" name="zone_id" class="w-100 form-control mt-lg-1 mt-md-2">
                                                <option>Todos</option>
                                                @foreach ($zones as $zone)
                                                    <option class="fa fa-cutlery"  id="zone_id" value="{{$zone->zone_name}}"> {{$zone->zone_name}}</option>
                                                @endforeach
                                        
                                            </select>
                                        </div> --}}
                                        {{-- <div class="form-group col-md-6">
                                            <input class="w-100 form-control mt-lg-1 mt-md-2" type="date">
                                        </div> --}}
                                        <div class="form-group col-md-12 mt-4">
                                            <button type="submit" class="btn btn-primary active w-100 mt-lg-1 mt-md-2">Troba el meu
                                                esdeveniment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->
<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Evdeveniments Destacats</h2>
                    <p>Els millors esdeveniments propers</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            
            <div class="col-lg-12">
                <div class="trending-ads-slide">
                    @foreach ($destacados as $destacado)
                    <div class="col-sm-12 col-lg-4">
                        <!-- product card -->
                        <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    <a href="{{route ('event.show', $destacado)}}">
                                        <img style="width: 100% !important; height: 100% !important" class="card-img-top img-fluid"
                                            src="http://localhost:8000/storage/{{$destacado->img}}"
                                            alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{route ('event.show', $destacado)}}">{{$destacado->name}}</a></h4>
                                    <ul class="list-inline product-meta">
                                        <li class="list-inline-item">
                                            <a href="{{route ('event.show', $destacado)}}"><i class="fa fa-list-alt"></i>Categoria: {{$destacado->title}}</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a><i class="fa fa-calendar"></i> Data: del {{date("d M, Y", strtotime($destacado->fecha_inicio));}} al {{date("d M, Y", strtotime($destacado->fecha_final));}} Horari: {{date('h:i A', strtotime($destacado->hora_inicio))}} - {{date('h:i A', strtotime($destacado->hora_fin))}}</a>
                                        </li>
                                    </ul>
                                    <p class="card-text">{{ $destacado->description}}</p>
                                    <p class="card-text">@if ($destacado->price==0)
                                        Gratis
                                        @else 
                                        {{$destacado->price}} €
                                       @endif</p>
                                       {{-- Rating --}}
                                    {{-- <div class="product-ratings">
                                        <ul class="list-inline">
                                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <h1>eventos</h1> --}} 
    {{-- @foreach ($events as $event)
                    <div class="col-sm-12 col-lg-4">
                        <!-- product card -->
                        <div class=" bg-light">
                            <div class="">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    <a href="{{route ('event.show', $event)}}">
                                        <img class="card-img-top img-fluid"
                                            src="http://localhost:8000/storage/{{$event->img}}"
                                            alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{route ('event.show', $event)}}">{{$event->name}}</a></h4>
                                    <ul class="list-inline product-meta">
                                        <li class="list-inline-item">
                                            <a href="{{route ('event.show', $event)}}"><i class="fa fa-list-alt"></i>Categoria: {{$category->title}}</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="cagatio.html"><i class="fa fa-calendar"></i> Data: del {{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}} Horari: {{date('h:i A', strtotime($event->hora_inicio))}} - {{date('h:i A', strtotime($event->hora_fin))}}</a>
                                        </li>
                                    </ul>
                                    <p class="card-text">{{ $event->description}}</p>
                                    <p class="card-text">@if ($event->price==0)
                                        Gratis
                                        @else 
                                        {{$event->price}} €
                                       @endif</p>   
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                    {{-- <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                        <!-- Recently Favorited -->
                        <div class="widget dashboard-container my-adslist ">
                            <h3 class="widget-header">Esdeveniments</h3>
                            <table class="table product-dashboard-table">
                                <thead>
                                    <tr>
                                        <th>Imatge</th>
                                        <th class="text-center">Titol del esdeveniment</th>
                                        <th class="text-center">Categoría</th>
                                        <th class="text-center">Acció</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td class="product-thumb">
                                            <img width="80px" height="auto" src="http://localhost:8000/storage/{{$event->img}}" alt="image description" ></td>
                                        <td class="product-details">
                                            <h3 class="title">{{$event->name}}</h3>
                                            
                                            <span><strong>Data: </strong><time> del {{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}}</time> </span>
                                            <span class="price"><strong>Preu: </strong>
                                                @if ($event->price==0)
                                                Gratis
                                                @else 
                                                {{$event->price}} €
                                               @endif</span>
                                        </td>
                                        <td class="product-category"><span class="categories">{{$category->title}}</span></td>
                                        <td class="action" data-title="Action">
                                            <div class="">
                                                <ul class="list-inline justify-content-center">
                                                    <li class="list-inline-item">
                                                        <a data-toggle="tooltip" data-placement="top" title="View" class="view" href="{{route ('event.show', $event)}}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    @if (Route::has('login'))
                                                    <li class="list-inline-item">
                                                        @if(Auth::check())
                                                        <a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{route ('event.edit', $event)}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" >
                                                        <a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="{{route('admin.index')}}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                    @endif
                                                        @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>        
                    </div> --}}
 
    @foreach ($events as $event)
    <div class="container-md" >
    <a class="text-dark" href="{{route ('event.show', $event)}}" style="text-decoration: none">
        <div class="recycler d-inline cardEvent">
    {{-- 29 De octubre 2021 5:00 P.M - 5 de abril de 2022 --}}
    <div class="col-md-6 d-inline">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <h3 class="mb-0">
                    {{$event->name}}
                </h3>
                <div class="mb-1 text-muted pd-1">Del {{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}} Horario: {{date('h:i A', strtotime($event->hora_inicio))}} - {{date('h:i A', strtotime($event->hora_fin))}} </div>
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
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 80% !important; height: 80% !important; " src="http://localhost:8000/storage/{{$event->img}}" data-holder-rendered="true">
                </div>
            </div>
        </div>

    </div>

    </div>
    </a>
</div>
    @endforeach
</section>
{{-- @endforeach --}}  
@endsection