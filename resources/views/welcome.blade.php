
@extends('layouts.app')
@section('title', __('INICIO'))
@section('content')
    <div class="container-fluid">
        <div class="container">

            @if ($message = Session::get('success'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $activo=0;
                    @endphp
                    @foreach($carrusel as $imagen)
                    @if($activo==0)
                    <div class="carousel-item active">
                        <img src="{{Storage::disk('s3')->url($imagen->imagen)}}" class="d-block w-100" height="180px">
                    </div>    
                    @php
                        $activo=$activo+1;
                    @endphp
                    @else
                    <div class="carousel-item ">
                        <img src="{{Storage::disk('s3')->url($imagen->imagen)}}" class="d-block w-100" height="180px">
                    </div>
                    @endif
                    @endforeach


                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br>
        <div class="row justify-content-center" >
            <div class="col-md-12">
                <div class="card " >
                    <div class="text-center">
                        <br>
                        <h1 class="d-block d-sm-none">CASA JUAN</strong></h1>
                        <h1 class="d-none d-sm-block">Bienvenidos a CASA JUAN</strong></h1>
                        <br class="d-block d-sm-none">
                        <div class="float-center d-block d-sm-none">
                            <a class="btn btn-dark btn-lg btn-block" href="{{ asset('/pedidoOnline') }}"> Haz tu pedido</a>
                        </div>
                        <br>
                        <div class="float-center d-block d-sm-none">
                            <a class="btn btn-dark btn-lg btn-block" href="{{ asset('/productos') }}"> Productos</a>
                        </div>
                        <br>
                        @guest
                        <div class="float-center d-block d-sm-none">
                            <a class="btn btn-dark btn-lg btn-block" href="{{  route('reservaCliente.crear') }}"> Reservas</a>
                        </div>
                        @else
                        <div class="float-center d-block d-sm-none">
                            <a class="btn btn-dark btn-lg btn-block" href="{{  route('reservaCliente.lista') }}"> Reservas</a>
                        </div>
                        @endguest
                        <br>
                        <div class="float-center d-block d-sm-none">
                            <a class="btn btn-dark btn-lg btn-block" href="{{ asset('/mesasdisponibles') }}"> Mesas disponibles</a>
                        </div>              
                        <br>
                        <div class="float-center d-block d-sm-none">
                            <a class="btn btn-dark btn-lg btn-block" href="{{ asset('/cartas&menus') }}"> Menus y cartas</a>
                        </div>              
                        <br><div class="float-center d-block d-sm-none">
                            <a class="btn btn-dark btn-lg btn-block" href="{{ asset('/verpromociones') }}"> Promociones</a>
                        </div>              
                        <br>
                        <div class="container d-none d-sm-block">
                            <div class="card-columns">
                                <div class="card">
                                    <a href="/productos">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Productos')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Productos</h2></div>
                                </div>
                                @guest
                                <div class="card">
                                    <a href="{{  route('reservaCliente.crear') }}">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Reservas')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Reservas</h2></div>
                                </div>
                                @else
                                <div class="card">
                                    <a href="{{  route('reservaCliente.lista') }}">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Reservas')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Reservas</h2></div>
                                </div>
                                @endguest
                                
                                @guest
                                <div class="card">
                                    <a href="/cartas&menus">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Menu.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Carta</h2></div>
                                </div>
                                @else
                                <div class="card">
                                    <a href="/pedidoOnline">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Pedidos')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Pedidos</h2></div>
                                </div>
                                @endguest
                                
                                <div class="card">
                                    <a href="/mesasdisponibles">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Mesas')}}" alt="Card image cap" width="400"
                                            height="200">
                                    </a>
                                    <div class="text-center"><h2>Mesas Libres</h2></div>
                                </div>
                                <div class="card">
                                    <a href="/verpromociones">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Promociones')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Promociones</h2></div>
                                </div>
                                

                            </div>

                            

                            </div>
                        </div>
                    </div>

                    <div class="container d-none d-sm-block">
                        <div class="text-center">
                            <br>
                            <h1>Ultimos productos</strong></h1>
                            <br>
                        </div>
                        <div class="card-columns">
                            
                        @foreach ($articulos as $articulo)
                           
                        <div class="card">
                            <a href="/articulos">
                                <img class="card-img-top" src="{{Storage::disk('s3')->url($articulo->imagen)}}" alt="Card image cap"
                                    width="400" height="200">
                            </a>
                            <div class="text-center"><h2>{{$articulo->nombre}}</h2></div>
                        </div>
                        
                        @endforeach 

                           
                                                
          </div>
                </div>
            </div>
        </div>
    </div>
@endsection