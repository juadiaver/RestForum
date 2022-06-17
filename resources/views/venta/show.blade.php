@extends('layouts.pos')

@section('template_title')
    {{ $venta->name ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('pos.pdf',$venta->id) }}" target="blank"> Generar ticket</a>
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Mesa:</strong>
                            {{ $venta->mesa->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{  number_format($venta->precio, 2, ',', '.');}} €
                        </div>
                        <div class="form-group">
                            <strong>Modo Pago:</strong>
                            {{ $venta->modo_pago }}
                        </div>

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
                    <th>Total</th>
                    
                </tr>
            </thead>
            @forelse ($venta->articulos as $articulos)
            <tbody>
                
                @php
                    $precioTotal = $precioTotal+$articulos->precio*$articulos->pivot->cantidad;
                @endphp 
                    <tr>

                        <td>{{ $articulos->nombre }}</td>
                        <td>{{  number_format($articulos->pivot->precio, 2, ',', '.');}}  €</td>
                        <td>{{$articulos->pivot->cantidad}}</td>
                        <td>{{  number_format($articulos->pivot->precio*$articulos->pivot->cantidad, 2, ',', '.');}}  €</td>
                        
                    </tr>
            </tbody>

            @empty
            <div class="columns">
                <div class="column">
                    <h1 class="is-size-1">No hay articulos en la mesa</h1>
                </div>
      
            </div>
            @endforelse
            @if($precioTotal>0)
            
            <br>
            @endif    
        </table>
    </div>
</div>
    </section>
@endsection
