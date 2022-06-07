@extends('layouts.pos')
<style>
    .cards {
        padding-right: 300px;
        padding-left: 300px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 3fr));
        grid-auto-rows: minmax(100px, auto);
        grid-gap: 50px;

    }

    @media only screen and (max-width: 768px) {
        .cards {
            margin-left: 0;
            margin-right: 0;
            padding-left: 0;
            padding-right: 0;
        }
    }

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
            <div class="col-md-6 mx-auto">
                    <div class="card " style="width: 30rem;">
                        <a class="btn btn-secondary" href="{{ route('pos.cerrarCaja', $caja->id) }}"> Cerrar Caja</a>
                    </div>
                </div>
            </div>
        </div>
                    @if ($caja->abierta == 'Abierta')

                        <br>
                        <main class="cards">
                            @foreach ($mesas as $mesa)
                                @if ($mesa->activo == 'SI')
                                    <article class="card">
                                        <div class="card-body">
                                            <p>{{ $mesa->nombre }}</p>
                                            <a class="btn btn-primary" href="{{ route('pos.edit', $mesa->id) }}">
                                                {{ $mesa->nombre }}</a>
                                        </div>
                                    </article>
                                @else
                                    <article class="card">
                                        <div class="card-body">
                                            <p>{{ $mesa->nombre }}</p>
                                            <a class="btn btn-danger" href="{{ route('pos.edit', $mesa->id) }}">
                                                {{ $mesa->nombre }}</a>
                                        </div>
                                    </article>
                                @endif
                            @endforeach
                        </main>
                    @else
                        <div class="card" style="width: 20rem;">
                            <h2>Pulse el boton para abrir caja</h2>
                        </div>
                        <br>
                        <div class="card" style="width: 20rem;">
                            <a class="btn btn-primary" href="{{ route('cajas.create') }}"> Abrir caja</a>
                        </div>

                    @endif






                @endsection
