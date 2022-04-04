@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> elige el restaurante para administrar</h5>
				<br>
				<hr>
                <div class="container">
                    <div class="card-columns">
                    @foreach($restaurantes as $row)

					<div class="card">
                        <img class="card-img-top" src="{{ asset('storage/'.$row->imagen) }}" alt="Card image cap" width="500" height="200">
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->nombre }}</h5>
                            <p class="card-text">{{$row->descripcion}}</p>
                                <a href="#" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                    @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
