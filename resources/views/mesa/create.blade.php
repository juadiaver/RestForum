@extends('layouts.pos')

@section('template_title')
    Create Mesa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default" >
                    <div class="card-header">
                        <span class="card-title">Crear Mesa</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mesas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('mesa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
