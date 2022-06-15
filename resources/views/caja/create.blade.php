@extends('layouts.pos')

@section('template_title')
    Abrir caja
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Abrir caja</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cajas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('caja.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
