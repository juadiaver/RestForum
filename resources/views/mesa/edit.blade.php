@extends('layouts.pos')

@section('template_title')
    Actualizar Mesa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Mesa</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mesas.update', $mesa->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('mesa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
