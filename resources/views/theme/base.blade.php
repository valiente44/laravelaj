<!doctype html>
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



    {{-- nuestro css --}}
    <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    {{-- <header class="masthead mb-auto">
      <div class="inner">
        <nav class="nav nav-masthead  navbar-expand-lg  justify-content-center navbar-dark bg-dark">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Contact</a>
        </nav>
 
      </div>
    </header> --}}

    {{-- //header --}}

    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
   
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('event.index',["counter"=>1])}}" class="nav-link px-2 link-secondary fs-4">Eventos</a></li>
          <li><a href="{{route('user.show',[Auth::id()])}}" class="nav-link px-2 link-dark fs-4">Usuario</a></li>
          <li><a href="{{route('event.create')}}" class="nav-link px-2 link-dark fs-4">Form Event</a></li>
          <li><a href="{{route('category.create')}}" class="nav-link px-2 link-dark fs-4">Categorias</a></li>
          <li><a href="{{route('event.index',["counter"=>0])}}" class="nav-link px-2 link-dark fs-4">admin events</a></li>
          <li><a href="{{route('user.index')}}" class="nav-link px-2 link-dark fs-4">permisos usuarios</a></li>


          <li>   
         
 
            <li>    @if (Route::has('login'))
              <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                  @auth
                      <a href="{{ url('/dashboard') }}" class="enlace">Dashboard</a>
                  @else
                      <a href="{{ route('login') }}" class="enlace">Log in</a>
      
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="enlace">Register</a>
                      @endif
                  @endauth
              </div>
          @endif</li>
      </li>

     
        
        
        </ul>
  
        {{-- <div class="col-md-3 text-end">
          <button type="button" class="btn btn-outline-primary me-2"><a href="{{ url('/dashboard') }}" class="enlace">Dashboard</a></button>
          <button type="button" class="btn btn-primary"> <a href="{{ route('register') }}" class="enlace">Register</a></button>
        </div> --}}
      </header>


     

    @yield('indexEventos')
    @yield('content')
    @yield('form')
    @yield('categoryIndex')
    @yield('eventsAdmin')
    @yield('detailEvent')
    @yield('reserva')
    @yield('usersPermisions')
    @yield('userProfile')

 



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>