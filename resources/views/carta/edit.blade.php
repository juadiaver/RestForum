@extends('layouts.app')

@section('template_title')
    Update Carta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Carta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cartas.update', $carta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('carta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
