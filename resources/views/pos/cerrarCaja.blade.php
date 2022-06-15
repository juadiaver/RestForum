@extends('layouts.pos')
@section('title', __('POS'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="float-left">
                        <h2>Resumen de ventas </h2>

                        @if($total>0)
                        <h1>Total : {{$total}}€ </h1>
                        <h2>Ventas en efectivo : {{$ventasEfectivo}} , total : {{number_format($totalEfectivo, 2, ',', '.')}}€</h2>
                        <h2>Ventas en tarjeta : {{$ventasTarjeta}}, total : {{number_format($totalTarjeta, 2, ',', '.')}}€</h2>
                        @endif
                        </div>
                        @if($total>0)
                        <div class="float-right">
                        <form action="{{ route('pos.completarCierre', $caja->id) }}" method="POST">
                        @csrf
                        <a class="btn btn-primary" onClick="history.go(-1);"> Volver</a>
                        <button class="btn btn-primary" type="submit" onclick="confirm('Deseas cerrar la caja?')||event.preventDefault()"> CERRAR CAJA </button>
                        </form>
                        </div>
                    <br>
                @endif
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Id Venta</th>
                                <th>Mesa</th>
                                <th>Modo de pago</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        @forelse ($ventas as $venta)
                            <tbody>

                                
                                <tr>

                                    <td>{{ $venta->id }}</td>
                                    <td>{{ $venta->mesa->nombre }}</td>
                                    <td>{{ $venta->modo_pago }}</td>
                                    <td>{{ number_format($venta->precio, 2, ',', '.')}} €</td>
                                    <td><a class="btn btn-primary" href="{{ route('ventas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i></a></td>
                                </tr>


                            </tbody>
                </div>
            @empty
                <div class="columns">
                    <div class="column">
                        <h1 class="is-size-1">Noy hay ventas</h1>
                    </div>
                </div>
                @endforelse

                <br>
                </table>
            </div>
        </div>

    </div>
@endsection