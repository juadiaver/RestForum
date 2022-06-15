@extends('layouts.app')

@section('template_title')
    Datos Usuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Datos Usuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('datos-usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p>{{ $message }}</p>
                    </div>>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>User Id</th>
										<th>Direccion</th>
										<th>Edad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datosUsuarios as $datosUsuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $datosUsuario->nombre }}</td>
											<td>{{ $datosUsuario->apellidos }}</td>
											<td>{{ $datosUsuario->user_id }}</td>
											<td>{{ $datosUsuario->direccion }}</td>
											<td>{{ $datosUsuario->edad }}</td>

                                            <td>
                                                <form action="{{ route('datos-usuarios.destroy',$datosUsuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('datos-usuarios.show',$datosUsuario->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('datos-usuarios.edit',$datosUsuario->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $datosUsuarios->links() !!}
            </div>
        </div>
    </div>
@endsection
