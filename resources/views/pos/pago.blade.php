@extends('layouts.pos')
@section('title', __('POS'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <div class="card">

                    <div class="card-body">

                        {{ $mesa->nombre }}:  Resumen del pago
                        <div class="float-right">
                            <a class="btn btn-primary" onClick="history.go(-1);"> Volver</a>
                            <a class="btn btn-primary" href="{{ route('pos.index') }}"> Volver a mesas</a>
                        </div>
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
                                    <td>{{  number_format($articulos->precio, 2, ',', '.')}} €</td>
                                    <td>{{ $articulos->pivot->cantidad }}</td>
                                    <td>{{  number_format($articulos->precio * $articulos->pivot->cantidad, 2, ',', '.')}} €</td>
                                </tr>
                            </tbody>
                </div>
            @empty
                <div class="columns">
                    <div class="column">
                        <h1 class="is-size-1">Sin articulos en la mesa</h1>
                    </div>
                </div>
                @endforelse
                
                <h1>Total : {{number_format($precioTotal, 2, ',', '.')}}€ </h1>
                <form action="{{ route('pos.completarPago', $mesa->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="total" value="{{ $precioTotal }}">
                    <br>
                    <h3>Seleccione modalidad de pago</h3>
                    {{ Form::select('metodoPago',$metodoPago, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
                    <br>
                    <br>
                    <button class="btn btn-primary" type="submit"> REALIZAR PAGO </button>
                </form>
                <br>
                <br>
                </table>
            </div>
        </div>

    </div>
@endsection
