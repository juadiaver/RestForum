@extends('layouts.pos')

@section('template_title')
    Create Promocione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear promocion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promociones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('promocione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
