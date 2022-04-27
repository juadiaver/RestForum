@extends('layouts.app')

@section('template_title')
    Restaurante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Restaurante') }}
                            </span>

                             <div class="float-right">
                                <a class="dropdown-item" href="{{ route('restaurantes.edit',$restaurante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $restaurante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $restaurante->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $restaurante->email }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $restaurante->imagen }}
                        </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
