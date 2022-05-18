@extends('layouts.pos')
@section('title', __('Welcome'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">


                        {{ $mesa->nombre }} Rseumen del pago

                    </div>
                </div>
            </div>
            @php
                $precioTotal = 0;
            @endphp
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        @forelse ($mesa->articulos as $articulos)
                            <tbody>

                                @php
                                    $precioTotal = $precioTotal + $articulos->precio * $articulos->pivot->cantidad;
                                @endphp
                                <tr>

                                    <td>{{ $articulos->nombre }}</td>
                                    <td>{{ $articulos->precio }} €</td>
                                    <td>{{ $articulos->pivot->cantidad }}</td>
                                    <td>{{ $articulos->precio * $articulos->pivot->cantidad }} €</td>
                                </tr>
                            </tbody>
                            <h1>Total : {{ $precioTotal }}€ </h1>
                            <form action="{{ route('pos.completarPago', $mesa->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary" type="submit"> REALIZAR PAGO </button>
                            </form>
                </div>
                
            @empty
                <div class="columns">
                    <div class="column">
                        <h1 class="is-size-1">Sin articulos en la mesa</h1>
                    </div>
                </div>
                @endforelse

                </table>
            </div>
        </div>

    </div>
@endsection
