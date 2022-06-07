@extends('layouts.pos')

@section('template_title')
    Update Promocione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Promocione</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promociones.update', $promocione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('promocione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
