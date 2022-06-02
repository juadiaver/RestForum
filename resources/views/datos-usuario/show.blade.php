@extends('layouts.app')

@section('template_title')
    {{ $datosUsuario->name ?? 'Show Datos Usuario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h5 class="card-title">Tus datos</h5>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuarios.editar',$datosUsuario->id) }}"> Editar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $datosUsuario->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $datosUsuario->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $datosUsuario->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $datosUsuario->edad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
