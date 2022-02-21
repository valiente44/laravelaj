@extends('theme.base')
<title>{{$event->name}}</title>

@section('detailEvent')
<section class="section bg-gray">
   <!-- Container Start -->
   <div class="container">
      <div class="row">
         @if (session('message'))
         <div class="alert alert-primary" role="alert">
            {{ session('message') }}
         </div>
         @endif
         <!-- Left sidebar -->
         <div class="col-md-8">
            <div class="product-details">
               <h1 class="product-title">{{$event->name}}</h1>
               <div class="product-meta">
                  <ul class="list-inline">
                     <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a>Ajuntament</a></li>
                     <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Localització<a >{{$event->zone->zone_name}}</a></li>
                     <li class="list-inline-item"><i class="fa fa-calendar"></i> Data<a >{{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}} Horario: {{date('h:i A', strtotime($event->hora_inicio))}} - {{date('h:i A', strtotime($event->hora_fin))}}</a></li>
                  </ul>
               </div>
               <!-- product slider -->
               <div class="" >
                  {{-- <div class="product-slider-item my-4" data-image="http://localhost:8000/storage/{{$event->img}}">
                     <img class="" src="http://localhost:8000/storage/{{$event->img}}" alt="product-img">
                  </div> --}}
                  <img src="http://localhost:8000/storage/{{$event->img}}" class="img-fluid">
                  {{-- 
                  <div class="product-slider-item my-4" data-image="https://www.tiodenadal.online/wp-content/uploads/2021/06/caga-tio-log-for-sale-blanket.png">
                     <img class="d-block img-fluid w-100" src="https://www.tiodenadal.online/wp-content/uploads/2021/06/caga-tio-log-for-sale-blanket.png" alt="Second slide">
                  </div>
                  <div class="product-slider-item my-4" data-image="https://www.tiodenadal.online/wp-content/uploads/2021/05/caga-tio-nas-vermell.png">
                     <img class="d-block img-fluid w-100" src="https://www.tiodenadal.online/wp-content/uploads/2021/05/caga-tio-nas-vermell.png" alt="Third slide">
                  </div>
                  <div class="product-slider-item my-4" data-image="https://www.tiodenadal.online/wp-content/uploads/2021/05/caga-tio-de-nadal-for-decoration.png">
                     <img class="d-block img-fluid w-100" src="https://www.tiodenadal.online/wp-content/uploads/2021/05/caga-tio-de-nadal-for-decoration.png" alt="Third slide">
                  </div>
                  <div class="product-slider-item my-4" data-image="https://www.tiodenadal.online/wp-content/uploads/2021/05/cgaa-tio-for-sale-medium.png">
                     <img class="d-block img-fluid w-100" src="https://www.tiodenadal.online/wp-content/uploads/2021/05/cgaa-tio-for-sale-medium.png" alt="Third slide">
                  </div>
                  --}}
               </div>
               <!-- product slider -->
               <div class="content mt-5 pt-5">
                  <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                           aria-selected="true">Descripció</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                           aria-selected="false">Detalls</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
                           aria-selected="false">Opinións</a>
                     </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h3 class="tab-title">Detalls de l'esdeveniment</h3>
                        <p>{{$event->description}}</p>
                        {{-- <iframe width="100%" height="400" src="https://www.youtube.com/embed/cJ0mGazsAkU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                     </div>
                     <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h3 class="tab-title">Specifications</h3>
                        <table class="table table-bordered product-table">
                           <tbody>
                              <tr>
                                 <td>Preu</td>
                                 <td>{{$event->price}}</td>
                              </tr>
                              <tr>
                                 <td>Data</td>
                                 <td>Del {{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}} Horario: {{date('h:i A', strtotime($event->hora_inicio))}} - {{date('h:i A', strtotime($event->hora_fin))}}</td>
                              </tr>
                              <tr>
                                 <td>Localització</td>
                                 <td>{{$event->zone->zone_name}}, {{$event->zone->adress}}, {{$event->zone->surface}}</td>
                              </tr>
                              <tr>
                                 <td>Capacitat</td>
                                 <td>{{$event->capacity}}</td>
                              </tr>
                              <tr>
                                <td>Reserva</td>
                                <td>@if (Auth::check())
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                                        Reserva
                                    </button>
                                    @endif
                                </td>
                             </tr>
                              
                           </tbody>
                        </table>
                     </div>
                     <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h3 class="tab-title">Opinións de altres anys</h3>
                        <div class="product-review">
                           @foreach ($event->opinions as $opinion)
                       
                           <p>Usuario: {{$opinion->user->name}}</p>
                           <p>Comentario: {{$opinion->opinion_text}}</p>
                           <p>rating: {{$opinion->rating}}</p>
                       
                           @endforeach
                           @if ($event->Booking)
                       
                               @foreach ($event->Booking as $reserva)
                                   {{$reserva->user_id}}
                                   @if ($reserva->user_id==Auth::user()->id)
                                   <h3>dejar reseña</h3>
                                   <form action="{{ route ('opinion.store')}}" method="POST">
                                      @csrf
                                      <label for="opinion_text" class="form-label">Reseña</label>
                                      <textarea id="opinion_text" name="opinion_text" cols="30" rows="4" class="form-control"></textarea>
                                      <p class="form-text">Escribe la reseña</p>
                                      @error('opinion_text')
                                      <p class="form-text">{{ $message }}</p>
                                      @enderror
                                      <label for="rating" class="form-label">Rating</label>
                                      <input type="number" name="rating" id="rating" min="1" max="5">
                                      <p class="form-text">Puntua el evento</p>
                                      @error('rating')
                                      <p class="form-text">{{ $message }}</p>
                                      @enderror
                                      <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">
                                      <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
                                      <input type="hidden" name="" value="">
                                      <button type="submit" class="btn btn-info">Envia</button>
                                   </form>
                                   @endif
                               @endforeach
                       
                          
                           @endif
                           {{-- </p>  --}}



                           {{-- 
                           <div class="media">
                              <!-- Avater -->
                              <img src="images/user/user-thumb.png" alt="avater">
                              <div class="media-body">
                                 <!-- Ratings -->
                                 <div class="ratings">
                                    <ul class="list-inline">
                                       <li class="list-inline-item">
                                          <i class="fa fa-star"></i>
                                       </li>
                                       <li class="list-inline-item">
                                          <i class="fa fa-star"></i>
                                       </li>
                                       <li class="list-inline-item">
                                          <i class="fa fa-star"></i>
                                       </li>
                                       <li class="list-inline-item">
                                          <i class="fa fa-star"></i>
                                       </li>
                                       <li class="list-inline-item">
                                          <i class="fa fa-star"></i>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="name">
                                    <h5>Bogdan Strukx2</h5>
                                 </div>
                                 <div class="date">
                                    <p>Des 27, 2021</p>
                                 </div>
                                 <div class="review-comment">
                                    <p>
                                       Molt bonic tot, encara que no sóc de fer cagar el tió, aquest any m'ha fet molta ilusió.
                                    </p>
                                 </div>
                              </div>
                           </div>
                           --}}
                         
                       
                           {{-- 
                           <div class="review-submission">
                              <h3 class="tab-title">Deixa el teu comentari </h3>
                              <!-- Rate -->
                              <div class="rate">
                                 <div class="starrr"></div>
                              </div>
                              <div class="review-submit">
                                 <form action="#" class="row">
                                    <div class="col-lg-6">
                                       <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                       <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-12">
                                       <textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                       <button type="submit" class="btn btn-main">Envía</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           --}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="sidebar">
               <div class="widget price text-center">
                  <h4>Preu </h4>
                  <p> {{$event->price}} €</p>
               </div>
               <div class="widget text-center">
                <h4>Reserva: </h4>
                <p><a href="{{ route('booking.create', $event->id)}}" type="hidden"></a></p>
                <p>
                @if (Auth::check())
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
                        Reserva
                    </button>
                    <div class="modal fade" id="modalForm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h2 class="col-md-12">RESERVA</h2>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                
                                <!-- Modal Body -->
                               
                                {{-- <p><a href="{{ route('booking.create', $event->id)}}" type="hidden">Reserva</a></p> --}}
                                    
                                        <form action="{{ route ('booking.store')}}" method="POST">
                                        @csrf
                                        <div class="mb-4 mt-4">
                                            <label class="form-label mb-8 col-md-12" for="tickets">Quantes entrades vols: </label>
                                            <input class="" type="number" id="tickets" name="tickets"  min="1" max="5">
                                        </div>
                                        @error('tickets')
                                        <p class="form-text">{{ $tickets }}</p>
                                        @enderror
                                        <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
                                        <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tanca</button>
                                            <button type="submit" class="btn btn-info" onclick="info()">Reserva</button>
                                        </div>
                                        {{-- here --}}
                                            <script> 
                                           function info() {

                                                swal({
                                                title: 'Título',
                                                text: '',
                                                html: '{{$event->id}}',
                                                type: 'success',
                                                timer: 3000,
                                                });
                                                }
                                        </script>
                                        </form>
                                    
                            </div>
                        </div>
                    </div>
                @endif

               
                {{-- <p><a href="{{ route('booking.create', $event->id)}}">cum</a></p>
                <p>@if (Auth::check())
                    <form action="{{ route ('booking.store')}}" method="POST">
                       @csrf
                       <label for="tickets">Quantes entrades vols: </label>
                       <input type="number" id="tickets" name="tickets"  min="1" max="5">
                       @error('tickets')
                       <p class="form-text">{{ $tickets }}</p>
                       @enderror
                       <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
                       <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">
                       <button type="submit" class="btn btn-info">Reserva</button>
                    </form> --}}
                   
             </div>
               <!-- User Profile widget -->
               <div class="widget user text-center">
                  <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
                  <h4><a href="">Ajuntament d'estepona</a></h4>
                  <a href="">Veure tots els esdeveniments de l'ajuntament de Reus</a>
                  <ul class="list-inline mt-20">
                     <li class="list-inline-item"><a href="{{route('event.index',["counter"=>1])}}" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Ves-hi</a></li>
                  </ul>
                  <div class="widget disclaimer">
                     <h5 class="widget-header">Tips de Seguretat per l'esdeveniment</h5>
                     <ul>
                        <li>Mascareta obligatoria</li>
                        <br>
                        <li>Distancia social de 1,5 M</li>
                        <br>
                        <li>Desfinecció de mans</li>
                        <br>
                        <li>L'establiment compleix amb totes les mesures de seguretat</li>
                     </ul>
                  </div>
               </div>
               <!-- Map Widget -->
               <div class="widget map">
                  <div class="map">
                     <div id="map_canvas" data-latitude="41.1548" data-longitude="1.10868"></div>
                  </div>
               </div>
               <!-- Rate Widget -->
               <!-- <div class="widget rate">
                  <h5 class="widget-header text-center">What would you rate
                  	<br>
                  	this product</h5>
                  <div class="starrr"></div>
                  </div> -->
               <!-- Safety tips widget -->
               <!-- Coupon Widget -->
               <!-- <div class="widget coupon text-center">
                  <p>Have a great product to post ? Share it with
                  	your fellow users.
                  </p>
                  <a href="" class="btn btn-transparent-white">Submit Listing</a>
                  </div> -->
            </div>
         </div>
      </div>
   </div>
   <!-- Container End -->
</section>
{{-- 
<h1>{{$event->name}}</h1>
<img  src="http://localhost:8000/storage/{{$event->img}}" style="widht:100px !important; height:100px !important;" alt="">
<br>
Del {{date("d M, Y", strtotime($event->fecha_inicio));}} al {{date("d M, Y", strtotime($event->fecha_final));}} Horario: {{date('h:i A', strtotime($event->hora_inicio))}} - {{date('h:i A', strtotime($event->hora_fin))}} 
<p>{{$event->description}}</p>
<p>{{$event->price}}</p>
<p>{{$event->capacity}}</p>
<p>zona: {{$event->zone->zone_name}}</p>
<p>adress: {{$event->zone->adress}}</p>
<p>surface: {{$event->zone->surface}}</p>
<h3>reseñas</h3>
@foreach ($event->opinions as $opinion)
<p>{{$opinion->opinion_text}}</p>
<p>{{$opinion->rating}}</p>
@endforeach
@if (session('message'))
<div class="alert alert-primary" role="alert">
   {{ session('message') }}
</div>
@endif
@if (Auth::check())
<form action="{{ route ('booking.store')}}" method="POST">
   @csrf
   <label for="tickets">Quantes entrades vols: </label>
   <input type="number" id="tickets" name="tickets"  min="1" max="5">
   @error('tickets')
   <p class="form-text">{{ $tickets }}</p>
   @enderror
   <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
   <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">
   <button type="submit" class="btn btn-info">Reserva</button>
</form>
<h3>dejar reseña</h3>
<form action="{{ route ('opinion.store')}}" method="POST">
   @csrf
   <label for="opinion_text" class="form-label">Reseña</label>
   <textarea id="opinion_text" name="opinion_text" cols="30" rows="4" class="form-control"></textarea>
   <p class="form-text">Escribe la reseña</p>
   @error('opinion_text')
   <p class="form-text">{{ $message }}</p>
   @enderror
   <label for="rating" class="form-label">Rating</label>
   <input type="number" name="rating" id="rating" min="1" max="5">
   <p class="form-text">Puntua el evento</p>
   @error('rating')
   <p class="form-text">{{ $message }}</p>
   @enderror
   <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">
   <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
   <input type="hidden" name="" value="">
   <button type="submit" class="btn btn-info">Envia</button>
</form>
@endif
{{-- 
<form action="{{ route('booking.create', $event->id)}}" method="GET">
   --}}
   {{-- 
   <div class="mb"> --}}
      {{-- <button type="submit" class="btn btn-info">Reservar Evento</button> --}}
      {{-- <input type="hidden" name="_method" value="PUT">      --}}
      {{-- 
   </div>
   --}}
   {{-- 
</form>
--}}
@endsection
