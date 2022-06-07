@extends('layouts.app')

@section('template_title')
    {{ $articulo->name ?? 'Show Articulo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Articulo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('articulos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            
                            <img src="{{Storage::disk('s3')->url($articulo->imagen)}}" width="300px">
                            
                        </div>

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $articulo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $articulo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $articulo->categoria->nombre }}
                        </div>

                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $articulo->activo }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $articulo->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Orden:</strong>
                            {{ $articulo->orden }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
