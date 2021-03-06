<!DOCTYPE html>
<html>
<head>
    
    <title>@hasSection('title') @yield('title') | @endif CASA JUAN</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	  <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
    
        
        html {
      min-height: 100%;
      position: relative;
    }
    body {
      margin: 0;
      margin-bottom: 50px;
      background: #23EC55;
background: -webkit-radial-gradient(top right, #23EC55, #2D51C1);
background: -moz-radial-gradient(top right, #23EC55, #2D51C1);
background: radial-gradient(to bottom left, #23EC55, #2D51C1);
    }
    footer {
      
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 80px;
      
    }

    .thumbnail {
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
}
.thumbnail img {
    width: 80%;
}
.thumbnail .caption{
    margin: 7px;
}
.main-section{
    background-color: #343a40;
}
.dropdown{
    float:right;
    
}
.btn{
    border:0px;
    margin:10px 0px;
    box-shadow:none !important;
}
.dropdown .dropdown-menu{
    padding:20px;
    
    width:300px !important;
    
    box-shadow:0px 5px 30px black;
}
.total-header-section{
    border-bottom:1px solid #d2d2d2;
}
.total-section p{
    margin-bottom:20px;
}
.cart-detail{
    padding:15px 0px;
}
.cart-detail-img img{
    width:70px;
    height:70px;
    padding-left:15px;
}
.cart-detail-product p{
    margin:0px;
    color:#000;
    font-weight:500;
}
.cart-detail .price{
    font-size:12px;
    margin-right:10px;
    font-weight:500;
}
.cart-detail .count{
    color:#C2C2DC;
}
.checkout{
    border-top:1px solid #d2d2d2;
    padding-top: 15px;
}
.checkout .btn-primary{
    border-radius:50px;
    height:50px;
}
.dropdown-menu:before{
    
    position:absolute;
    top:-20px;
    right:50px;
    border:10px solid transparent;
    border-bottom-color:#fff;
}



    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" >

      
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm border border-dark">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    INICIO
                </a>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="container">
                  <div class="row">
                      
                              <button type="button" class="btn btn-info float-right" data-toggle="dropdown">
                                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                              </button>
                              <div class="col-lg-3 col-sm-3 col-3 main-section">
                              <div class="dropdown">
                              <div class="dropdown-menu">
                                  <div class="row total-header-section">
                                      <div class="col-lg-6 col-sm-6 col-6">
                                          <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                      </div>
                                      @php $total = 0 @endphp
                                      @foreach((array) session('cart') as $id => $details)
                                          @php $total += $details['price'] * $details['quantity'] @endphp
                                      @endforeach
                                      <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                          <p>Total: <span class="text-info"> {{ number_format($total , 2, ',', '.')}} ???</span></p>
                                      </div>
                                  </div>
                                  @if(session('cart'))
                                      @foreach(session('cart') as $id => $details)
                                          <div class="row cart-detail">
                                              <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                  <img src="{{Storage::disk('s3')->url($details['image'])}}" width="100" height="100" class="img-responsive" />
                                              </div>
                                              <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                  <p>{{ $details['name'] }}</p>
                                                  <span class="price text-info">{{ number_format($details['price'] , 2, ',', '.')}} ???</span> <span class="count"> Cantidad:{{ $details['quantity'] }}</span>
                                              </div>
                                          </div>
                                      @endforeach
                                  @endif
                                  @if(count((array) session('cart'))>=1)
                                  <div class="row">
                                      <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                          <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Ver Carrito</a>
                                      </div>
                                  </div>    
                                  @endif
                                  
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left Side Of Navbar -->
                @auth()
                <ul class="navbar-nav mr-auto">
                    
                    
                </ul>
                @endauth()
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    
                    @guest
                    <div>
                    <a class="navbar-brand text-white " href=" {{ asset('/contacto') }}">
                        Contacto
                    </a>
                    </div> 
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="navbar-brand text-white" href="{{ route('login') }}">Entrar</a>
                            </li>
                            
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="navbar-brand text-white" href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @endif
                    @else

                         
                        @php
                            $user = Auth::user();
                        @endphp
                        <div>   
                            @if ($user->role == 1)
                            <a class="dropdown-item" href="{{ asset('/contacto') }}" class="nav-link"> Contacto</a>
                            @endif
                        </div>
                        @if ($user->role == 0)
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ url('/home') }}" class="nav-link"> Administracion</a>
                        </div>     
                        @endif
        
                        @if ($user->datosUsuario == null)
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{  route('usuarios.crear') }}" class="nav-link"> Introduce tus datos</a>
                        </div>
                        @else
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ route('usuarios.datos',$user->datosUsuario->id) }}" class="nav-link"> Datos Personales</a>
                       </div>
                        @endif
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ asset('/pedidoOnline') }}" class="nav-link"> Productos</a>
                        </div>
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ asset('/pedidoOnline') }}" class="nav-link"> Pedidos</a>
                        </div>
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ asset('/mesasdisponibles') }}" class="nav-link"> Consultar mesas</a>
                        </div>
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ asset('/cartas&menus') }}" class="nav-link"> Cartas y menus</a>
                        </div>
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ asset('/verpromociones') }}" class="nav-link"> Promociones</a>
                        </div>
        
                       
                        <div>
                        <a class="navbar-brand text-white d-block d-sm-none" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Desconectar
                        </a>    
                        </div>   

                        
                        <li class="nav-item dropdown d-none d-sm-block" >
                            <a id="navbarDropdown" class="navbar-brand dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Menu
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if ($user->role == 1)
                                <a class="dropdown-item" href="{{ asset('/contacto') }}" class="nav-link"> Contacto</a>
                                @endif
                                @php
                                    $user = Auth::user();
                                @endphp
                                @if ($user->role == 0)
                                <a class="dropdown-item" href="{{ url('/home') }}" class="nav-link"> Administracion</a>

                                @endif

                                @if ($user->datosUsuario == null)
                                <a class="dropdown-item" href="{{  route('usuarios.crear') }}" class="nav-link"> Introduce tus datos</a>

                                @else

                                <a class="dropdown-item" href="{{ route('usuarios.datos',$user->datosUsuario->id) }}" class="nav-link"> Datos Personales</a>
                                @endif

                                <a class="dropdown-item" href="{{ asset('/pedidoOnline') }}" class="nav-link"> Productos</a>

                                <a class="dropdown-item" href="{{ asset('/pedidoOnline') }}" class="nav-link"> Pedidos</a>

                                <a class="dropdown-item" href="{{ asset('/mesasdisponibles') }}" class="nav-link"> Consultar mesas</a>

                                <a class="dropdown-item" href="{{ asset('/cartas&menus') }}" class="nav-link"> Cartas y menus</a>

                                <a class="dropdown-item" href="{{ asset('/verpromociones') }}" class="nav-link"> Promociones</a>

                                

                               

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Desconectar
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                 
                        </li>
                        
                    @endguest
                </ul>
            </div>
        </div>
    </nav>  
<br/>

<div class="container">
  
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
  
    @yield('content')
</div>
</div>
<footer class=" bg-dark text-center text-white">
        <div>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
  
        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
          </div> 
          <div class="text-center" >
            ?? 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">CasaJuan.com</a>
          </div>   
    <!-- Grid container -->
  
    
    <!-- Copyright -->
  </footer>  
@yield('scripts')
     
</body>
</html>