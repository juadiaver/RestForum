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
                            <span class="card-title"><strong>{{ $carta->nombre }}</strong></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cartamenu.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            
                            <div class="" style="background-color: rgb(255, 255, 255)">
                            {!! $carta->contenido !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
