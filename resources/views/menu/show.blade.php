@extends('layouts.pos')

@section('template_title')
    {{ $menu->name ?? 'Show Menu' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Menu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('menus.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $menu->nombre }}
                        </div>
                        <div class="form-group">
                            
                            <strong>Contenido:</strong>
                            <div class="" style="background-color: rgb(255, 255, 255)">
                            {!! $menu->contenido !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
