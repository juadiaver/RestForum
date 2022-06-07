@extends('layouts.app')

@section('template_title')
    {{ $reserva->name ?? 'Show Reserva' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Reserva</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservas.edit',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                            <a class="btn btn-primary" href="{{ asset('/calendar') }}"> Ir a calendario</a>
                            <a class="btn btn-primary" href="{{ route('reservas.index') }}"> Ir al indice</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            @if($reserva->user != null)
                                {{ $reserva->user->name }}
                            @else
                                Usuario no registrado
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $reserva->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Comensales:</strong>
                            {{ $reserva->comensales }}
                        </div>
                        <div class="form-group">
                            <strong>Comentarios:</strong>
                            {{ $reserva->comentarios }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $reserva->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $reserva->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $reserva->hora }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
