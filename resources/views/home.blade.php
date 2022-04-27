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
                          	<a href="/articulos">
                        		<img class="card-img-top" src="storage\producto-servicio.jpg" alt="Card image cap" width="400" height="200">
							</a>  
                    	</div>
						<div class="card">
							<a href="/categorias">
							  <img class="card-img-top" src="storage\categorias.jpg" alt="Card image cap" width="400" height="200">
						  </a>  
					  	</div>
					  	<div class="card">
							<a href="/restaurantes">
						  		<img class="card-img-top" src="storage\restaurante.jpg" alt="Card image cap" width="400" height="200">
					 		 </a>  
				  		</div>
                    
					

					

					
                    
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
