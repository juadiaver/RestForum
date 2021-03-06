@extends('layouts.pos')

@section('template_title')
    {{ $promocione->name ?? 'Show Promocione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver promocion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('promociones.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $promocione->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $promocione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $promocione->descuento }} %
                        </div>
                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $promocione->activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
