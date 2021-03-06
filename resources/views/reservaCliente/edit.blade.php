@extends('layouts.app')

@section('template_title')
    Update Reserva
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Reserva</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservaCliente.editar', $reserva->id) }}"  role="form" enctype="multipart/form-data">
                            
                            @csrf

                            @include('reservaCliente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
