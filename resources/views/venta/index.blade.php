@extends('layouts.app')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ventas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva venta') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Mesa</th>
										<th>Precio</th>
										<th>Modo Pago</th>
										<th>Ticket</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $venta->mesa->nombre }}</td>
											<td>{{ $venta->precio }}</td>
											<td>{{ $venta->modo_pago }}</td>
											<td>{{ $venta->ticket }}</td>
                                            <td>
                                            <div class="btn-group">
                                                <form action="{{ route('ventas.destroy',$venta->id) }}" method="POST">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Acciones
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item " href="{{ route('ventas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                <a class="dropdown-item" href="{{ route('ventas.edit',$venta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la venta:  {{$venta->nombre}}? \nLa venta no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                {!! $ventas->links() !!}
            </div>
        </div>
    </div>
@endsection
