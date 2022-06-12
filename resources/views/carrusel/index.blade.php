@extends('layouts.app')

@section('template_title')
    Carrusel
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Carrusel') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('carrusel.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva imagen') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Imagen</th>
										<th>Activa</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carrusels as $carrusel)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $carrusel->nombre }}</td>
											<td><img src="{{Storage::disk('s3')->url($carrusel->imagen)}}" width="200px" height="100px"></td>
											<td>{{ $carrusel->activa }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('carrusel.destroy',$carrusel->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item " href="{{ route('carrusel.show',$carrusel->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la iamgen? \nLa imagen no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
                                                    </div>
                                                    </form>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $carrusels->links() !!}
            </div>
        </div>
    </div>
@endsection
