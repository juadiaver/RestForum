@extends('layouts.app')

@section('template_title')
    Update Mesa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{$mesa->nombre}}</span>
                    
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('pos.index') }}"> Atras</a>
                    </div>
                </div>
                    <div class="card-body">
                        
                            @csrf

                            @include('pos.form')

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
