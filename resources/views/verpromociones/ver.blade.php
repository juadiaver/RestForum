@extends('layouts.app')

@section('template_title')
    {{ $promocion->nombre ?? 'ver promocion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><strong>{{ $promocion->nombre }}</strong></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('verpromociones.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <h1> Usa el codigo : <b>{{ $promocion->codigo}}</b></h1>
                            <h1> Obtendras un <b>{{ $promocion->descuento}}%</b> en tu compra.</h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
