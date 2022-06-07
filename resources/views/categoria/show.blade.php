@extends('layouts.app')

@section('template_title')
    {{ $categoria->nombre ?? 'Show Categoria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            
                            <img src="/storage/{{ $categoria->imagen }}" width="300px">
                            
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $categoria->descripcion }}
                        </div>
                        
                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $categoria->activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
