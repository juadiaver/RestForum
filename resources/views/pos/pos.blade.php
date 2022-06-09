@extends('layouts.pos')
<style>

</style>
@section('title', __('Welcome'))
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success justify-center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                    
            
                    @if ($caja->abierta == 'Abierta')
                    
                    <div class="card " style="width: 30rem;">
                        <a class="btn btn-secondary" href="{{ route('pos.cerrarCaja', $caja->id) }}"> Cerrar Caja</a>
                    </div>

                        <br>
                        <div class="cards">
                            @foreach ($mesas as $mesa)
                                @if ($mesa->activo == 'SI')
                                    <div class="card" style="width: 30rem;">
                                        <div class="card-body">
                                            <br>
                                            <a class="btn btn-primary" style="width: 30rem;" href="{{ route('pos.edit', $mesa->id) }}">
                                                {{ $mesa->nombre }}</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <br>
                                            <a class="btn btn-danger" style="width: 30rem;" href="{{ route('pos.edit', $mesa->id) }}">
                                                {{ $mesa->nombre }}</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                                </div>
                    @else
                        <div class="card">
                            <h2>Pulse el boton para abrir caja</h2>
                        </div>
                        <br>
                        <div class="card">
                            <a class="btn btn-primary" href="{{ route('cajas.create') }}"> Abrir caja</a>
                        </div>

                    @endif

                </div>
            </div>
        </div>




                @endsection
