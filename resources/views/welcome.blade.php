
@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://s3.eu-west-1.amazonaws.com/cdn.spydeals.nl/images/uploads/QEv83MjE4cuZhag4DoaGMxz1tusM7PiYkGxFaRgD.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://www.fincomercio.com/wp-content/uploads/2019/06/alimentacion-saludable.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://d2z0k43lzfi12d.cloudfront.net/blog/vcdn335/wp-content/uploads/2021/10/calculator-thumbnail_1200x300_BMR.jpg.webp" class="d-block w-100" alt="...">
                </div>
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
                        <h1>Bienvenidos a CASA JUAN</strong></h1>
                        <br>
                        <div class="float-center d-block d-sm-none">
                        
                            <a class="btn btn-dark btn-lg btn-block" href="{{ asset('/calendar') }}"> Productos</a>
                        
                        </div>

                        <br>

                        <div class="float-center d-block d-sm-none">
                        
                            <a class="btn btn-dark btn-lg btn-block" href="{{  route('reservaCliente.lista') }}"> Reservas</a>
                        </div>

                        <br>
                        <div class="float-center d-block d-sm-none">
                        
                            <a class="btn btn-dark btn-lg btn-block" href="{{ asset('/calendar') }}"> Menu</a>
                        </div>  
                                     
                        <br>
                        <div class="container d-none d-sm-block">
                            <div class="card-columns">
                                <div class="card">
                                    <a href="/articulos">
                                        <img class="card-img-top" src="storage\articulos.png" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Productos</h2></div>
                                </div>
                                <div class="card">
                                    <a href="{{  route('reservaCliente.lista') }}">
                                        <img class="card-img-top" src="storage\reserva.png" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Reservas</h2></div>
                                </div>
                                <div class="card">
                                    <a href="/carrito">
                                        <img class="card-img-top" src="storage\carrito.png" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <div class="text-center"><h2>Pedidos</h2></div>
                                </div>
                                <div class="card">
                                    <a href="/mesas">
                                        <img class="card-img-top" src="storage\mesa.png" alt="Card image cap" width="400"
                                            height="200">
                                    </a>
                                    <div class="text-center"><h2>Mesas Libres</h2></div>
                                </div>
                                <div class="card">
                                    <a href="/ventas">
                                        <img class="card-img-top" src="storage\promocion.png" alt="Card image cap"
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
                           
                                                
          </div>
                </div>
            </div>
        </div>
    </div>
@endsection