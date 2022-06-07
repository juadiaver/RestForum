@extends('layouts.app')

@section('template_title')
    {{ $caja->name ?? 'Show Caja' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Caja</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cajas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dineroinicial:</strong>
                            {{ $caja->dineroInicial }}
                        </div>
                        <div class="form-group">
                            <strong>Dinerofinal:</strong>
                            {{ $caja->dineroFinal }}
                        </div>
                        <div class="form-group">
                            <strong>Tarjeta:</strong>
                            {{ $caja->tarjeta }}
                        </div>
                        <div class="form-group">
                            <strong>Dinerotarjeta:</strong>
                            {{ $caja->dineroTarjeta }}
                        </div>
                        <div class="form-group">
                            <strong>Efectivo:</strong>
                            {{ $caja->efectivo }}
                        </div>
                        <div class="form-group">
                            <strong>Dineroefectivo:</strong>
                            {{ $caja->dineroEfectivo }}
                        </div>
                        <div class="form-group">
                            <strong>Abierta:</strong>
                            {{ $caja->abierta }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaapertura:</strong>
                            {{ $caja->fechaApertura }}
                        </div>
                        <div class="form-group">
                            <strong>Horaapertura:</strong>
                            {{ $caja->horaApertura }}
                        </div>
                        <div class="form-group">
                            <strong>Fechacierre:</strong>
                            {{ $caja->fechaCierre }}
                        </div>
                        <div class="form-group">
                            <strong>Horacierre:</strong>
                            {{ $caja->horaCierre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
