@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong></h5>
				<br>
				<hr>
                <div class="container">
                    <div class="card-columns">
                    

					<div class="card">
                        <img class="card-img-top" src="" alt="Card image cap" width="500" height="200">
                        <div class="card-body">
                            <h5 class="card-title">Articulos</h5>
                            <p class="card-text">Cosnulte o modifique sus articulos</p>
                                <a href="/articulos" class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                    
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
