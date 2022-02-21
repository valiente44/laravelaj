{{-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    {{-- dataTable boostrap 5 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">


    {{-- nuestro css --}}
    <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajuntament d'Estepona</title>
  
    <!-- FAVICON -->
    <link href="img/favicon.png" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/bootstrap/css/bootstrap-slider.css') }}">

    <!-- Font Awesome -->
    <link href="{{ url('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ url('plugins/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ url('plugins/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="{{ url('plugins/fancybox/jquery.fancybox.pack.css') }}" rel="stylesheet">
    <link href="{{ url('plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
  </head>
  <body>        
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light navigation">
						<a class="navbar-brand" href="/">
							<img src="{!! asset('images\logo.png') !!}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
            
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav main-nav ">
                <li class="nav-item active">
                </li>
                @if (Route::has('login'))
                  @if(Auth::check())
                  <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                      >El meu perfil <span><i class="fa fa-angle-down"></i></span>
                    </a>
  
                    <!-- Dropdown list -->
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{route('user.show',[Auth::id()])}}">Dades d'usuari</a>

                    </div>
                  </li>
                
                  @if (Auth::user()->user_types==1)
								<li class="nav-item dropdown dropdown-slide">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown"
										>Gestió d'administrador <span><i class="fa fa-angle-down"></i></span>
									</a>

									<!-- Dropdown list -->
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{route('event.create')}}">Crear esdeveniment</a>
                    <a class="dropdown-item" href="{{route('admin.index')}}">Editar esdeveniments</a>
                    <a class="dropdown-item" href="{{route('category.create')}}">Administrar
											categories</a>
										<a class="dropdown-item" href="{{route('zone.create')}}">Administrar
											zones</a>
									</div>
								</li>
								<li class="nav-item dropdown dropdown-slide">
									<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										Gestió d'usuaris <span><i class="fa fa-angle-down"></i></span>
									</a>
									<div class="dropdown-menu">
										
                      {{-- <a class="dropdown-item" href="{{route('user.show',[Auth::id()])}}">Mi perfil</a> --}}
                        <a class="dropdown-item" href="{{route('user.index')}}">Llistar
                          usuaris</a>
									</div>

                  
								</li>     
          
                @endif             
                  <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Sessió <span><i class="fa fa-angle-down"></i></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/">Inici</a>
                      <form action="/logout" method="post">
                        @csrf
                        <input class="dropdown-item" type="submit" value="Desconecta't" />
                      </form>
                    </div>
                  </li>
                  @else
                  <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Accions d'usuari <span><i class="fa fa-angle-down"></i></span>
                  </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('login') }}">Conecta't</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Registra't</a>
                      </div> 
                    </li>                      
                   @endif
                @endif  
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</section>
  
      </header>


      
    @yield('indexEventos')
    @yield('content')
    @yield('form')
    @yield('categoryIndex')
    @yield('zonesIndex')
    @yield('eventsAdmin')
    @yield('detailEvent')
    @yield('reserva')
    @yield('usersPermisions')
    @yield('userProfile')
    @yield('editZone')
    @yield('userEdit')

<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
      <div class="row">
          <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
              <!-- About -->
              <div class="block about">
                  <!-- footer logo -->
                  <img src="images/logo-footer.png" alt="">
              </div>
          </div>
          <!-- Link list -->
          <div class="col-lg-2 offset-lg-1 col-md-3">
              <div class="block">
                  <h4>Págines</h4>
                  <ul>
                      <li><a href="/">Inici</a></li>
                  </ul>
              </div>
          </div>
          <!-- Link list -->
          <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
            @if (Route::has('login'))
              @auth
              <div class="block">
                  <h4>Págines d'administrador</h4>
                  <ul>
                      <li><a href="{{route('user.show',[Auth::id()])}}">Perfil</a></li>
                      <li><a href="{{route('user.index')}}">Llista d'usuaris</a></li>
                      <li><a href="{{route('category.create')}}">Administrar categories</a></li>
                      <li><a href="{{route('zone.create')}}">Administrar zones</a></li>
                      <li><a href="{{route('event.index',["counter"=>1])}}">Llistar/Editar esdeveniments</a></li>
                      <li><a href="{{route('event.create')}}">Crear esdeveniment</a></li>
                  </ul>
              </div>
              @endauth
            @endif
          </div>
          <!-- Promotion -->
          <div class="col-lg-4 col-md-7">
              <div class="block-2 app-promotion">
                  <div class="mobile d-flex">
                      <a>
                        
                          <img src="{!! asset('images/footer/phone-icon.png') !!}" alt="mobile-icon">
                      </a>
                      <p>Próximament tindrém aplicació mòvil</p>
                  </div>
                  <div class="download-btn d-flex my-3">
                      <a><img src="{!! asset('images/apps/google-play-store.png') !!}" class="img-fluid" alt=""></a>
                      <a class=" ml-3"><img src="{!! asset('images/apps/apple-app-store.png') !!}" class="img-fluid"
                              alt=""></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
      <div class="row">
          <div class="col-sm-6 col-12">
              <!-- Copyright -->
              <div class="copyright">
                  <p>Copyright © <script>
                          var CurrentYear = new Date().getFullYear()
                          document.write(CurrentYear)
                      </script>. All Rights Reserved, Raulito y Dani <a class="text-primary"
                      ></p>
              </div>
          </div>
          @include('cookieConsent::index')

          <div class="col-sm-6 col-12">
              <!-- Social Icons -->
              <ul class="social-media-icons text-right">
                  <li><a class="fa fa-facebook" href="https://www.facebook.com/" target="_blank"></a>
                  </li>
                  <li><a class="fa fa-twitter" href="https://www.twitter.com/" target="_blank"></a>
                  </li>
                  <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/"
                          target="_blank"></a></li>
              </ul>
          </div>
      </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
      <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

	<!-- JAVASCRIPTS -->
	<script src="{{ url('plugins/jQuery/jquery.min.js') }}"></script>
	<script src="{{ url('plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ url('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('plugins/bootstrap/js/bootstrap-slider.js') }}"></script>
	<!-- tether js -->
	<script src="{{ url('plugins/tether/js/tether.min.js') }}"></script>
	<script src="{{ url('plugins/raty/jquery.raty-fa.js') }}"></script>
	<script src="{{ url('plugins/slick-carousel/slick/slick.min.js') }}"></script>
	<script src="{{ url('plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ url('plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
	<script src="{{ url('plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
	<!-- google map -->
	<script src="{{ url('https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places') }}">
	</script>
	<script src="{{ url('plugins/google-map/gmap.js') }}"></script>
	<script src="{{ url('js/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- <x-cookie-consent-banner /> --}}

  </body>
</html> 