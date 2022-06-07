@extends('layouts.app')

@section('template_title')
    {{ $carta->name ?? 'Show Carta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Carta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cartas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $carta->nombre }}
                        </div>
                        
                        <div class="form-group">
                            <strong>Activa:</strong>
                            {{ $carta->activa }}
                        </div>
                        <div class="form-group">
                            <strong>Contenido:</strong>
                            {!! $carta->contenido !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
