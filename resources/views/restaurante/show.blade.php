@extends('layouts.app')

@section('template_title')
    {{ $restaurante->name ?? 'Show Restaurante' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Restaurante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('restaurantes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $restaurante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $restaurante->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $restaurante->email }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $restaurante->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
