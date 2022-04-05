@section('title', __('Restaurantes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Restaurantes</h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscador de restaurante">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Restaurante
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.restaurantes.create')
						@include('livewire.restaurantes.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th WIDTH="200">Imagen</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Mesas</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($restaurantes as $row)
							<tr> 
								<td><img src="{{ asset('storage/'.$row->imagen) }}" alt="Card image cap" width="200" height="100"></td>
								<td style="vertical-align:middle">{{ $row->nombre }}</td>
								<td style="vertical-align:middle">{{ $row->descripcion }}</td>
								<td style="vertical-align:middle">{{ $row->mesas }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Eliminar Restaurante: {{$row->nombre}}? \nEl restaurante no puede ser recuperado!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $restaurantes->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
