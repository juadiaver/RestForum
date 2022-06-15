@extends('layouts.app')

@section('template_title')
    Reserva
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card " >
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
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="card-body d-none d-sm-block" >
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
                                                    <form action="{{ route('reservaCliente.eliminar',$reserva->id) }}" method="POST">
                                                        @csrf
                                                        
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Deseas borrar la reserva del:\n  {{$reserva->fecha}} ')||event.preventDefault()"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                      </form>							 
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="row">    
                    <div class="col-sm-6 d-block d-sm-none">
                        @foreach ($reservas as $reserva)
                        <div class="card  mb-3 ">
                            <h4 class="card-header">                            
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $reserva->fecha }}
                                </button>
                                @if($reserva->estado == "Modificada")
                                        <div  class="btn btn-warning col-6" style="margin-left:40px">
                                            {{ $reserva->estado }}
                                        </div>
                                @elseif($reserva->estado == "Pendiente")
                                        <div  class="btn btn-danger col-6" style="margin-left:40px">
                                            {{ $reserva->estado }}
                                        </div>
                                @elseif($reserva->estado == "Confirmado") 
                                        <div  class="btn btn-success col-6" style="margin-left:40px">
                                            {{ $reserva->estado }}
                                        </div>
                                @endif
                                
                                
                                <div class="dropdown dropdown-menu" style="width: 320px;position: absolute;">
                                        
                                    <div class="card-body ">
                                        <br>
                                          <h5 class="card-title text-center">{{ $reserva->nombre }} : {{ $reserva->comensales }} PAX</h5>
                                          <h5 class="card-title text-center">Hora : {{ $reserva->hora }}</h5>
                                          <h5 class="card-title text-center">Comentarios : </h5>
                                          <p class="card-text text-center">{{ $reserva->comentarios }}</p>
                                          <a class="btn btn-primary btn-lg btn-block" href="{{ route('reservaCliente.editar',$reserva->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                          <form action="{{ route('reservaCliente.eliminar',$reserva->id) }}" method="POST">
                                            @csrf
                                            
                                            <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="return confirm('Deseas borrar la reserva del:\n  {{$reserva->fecha}} ')||event.preventDefault()"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                          </form>
                                          
                                        			 
                                    </div>
                                </div>
                            </div>
                          
                            </h4>
                            
                          </div> 
                        @endforeach
                    <br>
                    </div>
                    <br>
                </div>

                {!! $reservas->links() !!}
            </div>
        </div>
    </div>
@endsection
