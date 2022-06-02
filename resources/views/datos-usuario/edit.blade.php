@extends('layouts.app')

@section('template_title')
    Update Datos Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h5 class="card-title">Actualiza tus datos</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('usuarios.editar', $datosUsuario->id) }}"  role="form" enctype="multipart/form-data">
                            
                            @csrf

                            @include('datos-usuario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
