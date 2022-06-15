@extends('layouts.pos')

@section('template_title')
    Reserva
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reserva') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reservas.create') }}" class="btn btn-primary"  data-placement="left">
                                  Crear reserva
                                </a>
                                <a class="btn btn-primary" href="{{ asset('/calendar') }}"> Ir a calendario</a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body d-none d-sm-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>User Id</th>
										<th>Nombre</th>
										<th>Comensales</th>
										<th>Comentarios</th>
										<th>Estado</th>
										<th>Fecha</th>
										<th>Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservas as $reserva)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reserva->user_id }}</td>
											<td>{{ $reserva->nombre }}</td>
											<td>{{ $reserva->comensales }}</td>
											<td>{{ $reserva->comentarios }}</td>
											<td>{{ $reserva->estado }}</td>
											<td>{{ $reserva->fecha }}</td>
											<td>{{ $reserva->hora }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item " href="{{ route('reservas.show',$reserva->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('reservas.edit',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la mesa:  {{$reserva->id}}? \nLa mesa no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($reservas as $reserva)
                                        <tr>
											<td>{{ $reserva->nombre }}</td>
											<td>{{ $reserva->fecha }}</td>
											<td>{{ $reserva->hora }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item " href="{{ route('reservas.show',$reserva->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('reservas.edit',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la mesa:  {{$reserva->id}}? \nLa mesa no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                {!! $reservas->links() !!}
            </div>
        </div>
    </div>
@endsection
