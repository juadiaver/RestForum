@extends('layouts.pos')

@section('template_title')
    Listado de articulos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de articulos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('articulos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Articulo') }}
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
                    <nav class="navbar navbar-light float-right">
                        <form class="form-inline">
                      
                          <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                            <option>nombre</option>
                            <option>categoria</option>
                            <option>activo</option>
                            <option>precio</option>
                            
                          </select>
                      
                      
                          <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por ..." aria-label="Search">
                      
                      
                          
                          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
                        </form>

                      </nav>    
                    <div class="card-body d-none d-sm-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Imagen</th>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Categoria</th>
										<th>Activo</th>
										<th>Precio</th>
										<th>Orden</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articulos as $articulo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td><img src="{{Storage::disk('s3')->url($articulo->imagen)}}" width="150" height="100"></td>
											<td>{{ $articulo->nombre }}</td>
											<td>{{ $articulo->descripcion }}</td>
											<td>{{ $articulo->categoria->nombre }}</td>
											<td>{{ $articulo->activo }}</td>
											<td>{{  number_format($articulo->precio, 2, ',', '.');}} €</td>
											<td>{{ $articulo->orden }}</td>

                                            <td>
                                               
                                                <div class="btn-group">
                                                    <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item " href="{{ route('articulos.show',$articulo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('articulos.edit',$articulo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="return confirm('Deseas borrar el articulo:  {{$articulo->nombre}}? \nEl articulo no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
										<th>Nombre</th>
                                        <th>Activo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($articulos as $articulo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $articulo->nombre }}</td>
                                            <td>{{ $articulo->activo }}</td>
                                            <td>
                                               
                                                <div class="btn-group">
                                                    <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item " href="{{ route('articulos.show',$articulo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('articulos.edit',$articulo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="return confirm('Deseas borrar el articulo:  {{$articulo->nombre}}? \nEl articulo no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                {!! $articulos->appends(["tipo" => $tipo,"buscarpor" => $buscar]) !!} 

            </div>
        </div>
    </div>
@endsection
