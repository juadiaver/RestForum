@extends('layouts.pos')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">

    <div class="col-md-12 mx-auto">
        <div class="card">

            <div class="card-body">
                <div class="float-left">
                <h3>Ticket de venta numero {{$venta->id}}</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-danger" href="{{ route('pos.pdf',$venta->id) }}" target="blank"> Generar pdf</a>
                <a class="btn btn-primary" href="{{ asset('/pos') }}" > Volver a mesas</a>
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
                @forelse ($venta->articulos as $articulos)
                <tbody>
                    
                    @php
                        $precioTotal = $precioTotal+$articulos->precio*$articulos->pivot->cantidad;
                    @endphp 
                        <tr>
    
                            <td>{{ $articulos->nombre }}</td>
                            <td>{{ $articulos->precio }} €</td>
                            <td>{{$articulos->pivot->cantidad}}</td>
                            <td>{{$articulos->precio*$articulos->pivot->cantidad}} €</td>
                            
                            <tr>
                        <tbody>
    
                @empty
                <div class="columns">
                    <div class="column">
                        <h1 class="is-size-1">No hay articulos en la mesa</h1>
                    </div>
          
                </div>
                @endforelse
                @if($precioTotal>0)
                <h1>Total : {{$precioTotal}}€ </h1>
                <br>
                @endif    
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection

