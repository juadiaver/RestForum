@extends('layouts.app')

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

                            <h5 id="card_title">
                                {{ __('Reserva') }}
                            </h5>

                             <div class="float-right">
                                <a href="{{ route('reservaCliente.crear') }}" class="btn btn-primary"  data-placement="left">
                                  Crear reserva
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
                                            
											<td>{{ $reserva->nombre }}</td>
											<td>{{ $reserva->comensales }}</td>
											<td>{{ $reserva->comentarios }}</td>
											<td>{{ $reserva->estado }}</td>
											<td>{{ $reserva->fecha }}</td>
											<td>{{ $reserva->hora }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <a class="dropdown-item" href="{{ route('reservaCliente.editar',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
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
