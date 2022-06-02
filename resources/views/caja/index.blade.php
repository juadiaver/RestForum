@extends('layouts.app')

@section('template_title')
    Caja
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Caja') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cajas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Dineroinicial</th>
										<th>Dinerofinal</th>
										<th>Tarjeta</th>
										<th>Dinerotarjeta</th>
										<th>Efectivo</th>
										<th>Dineroefectivo</th>
										<th>Abierta</th>
										<th>Fechaapertura</th>
										<th>Horaapertura</th>
										<th>Fechacierre</th>
										<th>Horacierre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cajas as $caja)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $caja->dineroInicial }}</td>
											<td>{{ $caja->dineroFinal }}</td>
											<td>{{ $caja->tarjeta }}</td>
											<td>{{ $caja->dineroTarjeta }}</td>
											<td>{{ $caja->efectivo }}</td>
											<td>{{ $caja->dineroEfectivo }}</td>
											<td>{{ $caja->abierta }}</td>
											<td>{{ $caja->fechaApertura }}</td>
											<td>{{ $caja->horaApertura }}</td>
											<td>{{ $caja->fechaCierre }}</td>
											<td>{{ $caja->horaCierre }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('cajas.destroy',$caja->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item " href="{{ route('cajas.show',$caja->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('cajas.edit',$caja->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la venta:  {{$caja->id}}? \nLa venta no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                {!! $cajas->links() !!}
            </div>
        </div>
    </div>
@endsection
