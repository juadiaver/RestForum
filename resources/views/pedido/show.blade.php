@extends('layouts.pos')

@section('template_title')
    {{ $pedido->name ?? 'Show Pedido' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $pedido->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $pedido->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Modo Pago:</strong>
                            {{ $pedido->modo_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Ticket:</strong>
                            <div class="col-md-12 " style="background-color: rgb(255, 255, 255)">
                            {!! $pedido->ticket !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pedido->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $pedido->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
