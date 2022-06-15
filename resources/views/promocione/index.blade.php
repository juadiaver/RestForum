@extends('layouts.pos')

@section('template_title')
    Promociones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Promociones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('promociones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear promocion
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="card-body d-none d-sm-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Codigo</th>
										<th>Nombre</th>
										<th>Descuento</th>
										<th>Activo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promociones as $promocione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $promocione->codigo }}</td>
											<td>{{ $promocione->nombre }}</td>
											<td>{{ $promocione->descuento }} %</td>
											<td>{{ $promocione->activo }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('promociones.destroy',$promocione->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu">
                                                    <a class="dropdown-item " href="{{ route('promociones.show',$promocione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('promociones.edit',$promocione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la promocion:  {{$promocione->id}}? \nLa promocion no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                    <div class="card-body d-block d-sm-none">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Codigo</th>
										<th>Activo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach ($promociones as $promocione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $promocione->codigo }}</td>
											<td>{{ $promocione->activo }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('promociones.destroy',$promocione->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu">
                                                    <a class="dropdown-item " href="{{ route('promociones.show',$promocione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('promociones.edit',$promocione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la promocion:  {{$promocione->id}}? \nLa promocion no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                {!! $promociones->links() !!}
            </div>
        </div>
    </div>
@endsection
