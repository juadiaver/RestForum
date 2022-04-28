@extends('layouts.app')

@section('template_title')
    {{ $promocion->name ?? 'Show Promocion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Promocion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('promocions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $promocion->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $promocion->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $promocion->descuento }}
                        </div>
                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $promocion->activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
