@extends('layouts.pos')
@section('title', __('ADMINISTRACION'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Hola <strong>{{ Auth::user()->name }},</strong></h5>
                        <br>
                        <hr>
                        <div class="container">
                            <div class="card-columns">
                                <div class="card text-center">
                                    <a href="/articulos">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Productos')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Articulos</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/categorias">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('categorias.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Categorias</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/restaurantes">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('restaurante.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Restaurante</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/mesas">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Mesas')}}" alt="Card image cap" width="400"
                                            height="200">
                                    </a>
                                    <h1 class="card-title">Mesas</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/ventas">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('ventas.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Ventas</h1>
                                </div>

                            </div>
                            <br>
                            <div class="card-columns">
                                <div class="card text-center">
                                    <a href="/pedidos">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Pedidos')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Pedidos</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/calendar">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Reservas')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Reservas</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/pos">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('pos.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">POS</h1>
                                </div>

								<div class="card text-center">
                                    <a href="/menus">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Menu.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Menus</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/cajas">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Cajas.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Cajas</h1>
                                </div>
                            </div>
                            <div class="card-columns">
                                <div class="card text-center">
                                    <a href="/cartas">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Carta.png')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Cartas</h1>
                                </div>
                                <div class="card text-center">
                                    <a href="/promociones">
                                        <img class="card-img-top" src="{{Storage::disk('s3')->url('Promociones')}}" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                    <h1 class="card-title">Promocion</h1>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
