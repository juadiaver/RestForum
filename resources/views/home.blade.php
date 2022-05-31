@extends('layouts.app')
@section('title', __('Dashboard'))
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
                                <div class="card">
                                    <a href="/articulos">
                                        <img class="card-img-top" src="storage\producto-servicio.jpg" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="/categorias">
                                        <img class="card-img-top" src="storage\categorias.jpg" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="/restaurantes">
                                        <img class="card-img-top" src="storage\restaurante.jpg" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="/mesas">
                                        <img class="card-img-top" src="storage\mesas.jpg" alt="Card image cap" width="400"
                                            height="200">
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="/ventas">
                                        <img class="card-img-top" src="storage\ventas.jpg" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>

                            </div>

                            <div class="card-columns">
                                <div class="card">
                                    <a href="/pedidos">
                                        <img class="card-img-top" src="storage\pedidos.png" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="/reservas">
                                        <img class="card-img-top" src="storage\reservas.png" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="/pos">
                                        <img class="card-img-top" src="storage\ventas.jpg" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>

								<div class="card">
                                    <a href="/calendar">
                                        <img class="card-img-top" src="storage\reservas.png" alt="Card image cap"
                                            width="400" height="200">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
