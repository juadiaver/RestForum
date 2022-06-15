@extends('layouts.pos')

@section('template_title')
    Update Mesa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{$mesa->nombre}}</span>
                    
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('pos.index') }}"> Atras</a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">

                            @csrf

                            @include('pos.form')

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
