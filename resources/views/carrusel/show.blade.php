@extends('layouts.pos')

@section('template_title')
    {{ $carrusel->name ?? 'Show Carrusel' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver imagen</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('carrusel.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $carrusel->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $carrusel->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Activa:</strong>
                            {{ $carrusel->activa }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
