@extends('layouts.app')

@section('template_title')
    Carta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Carta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cartas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear carta') }}
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
										<th>Activa</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartas as $carta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $carta->nombre }}</td>
											<td>{{ $carta->activa }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('cartas.destroy',$carta->id) }}" method="POST">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    </button>
                                                    <div class="dropdown-menu">
                                                    <a class="dropdown-item " href="{{ route('cartas.show',$carta->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="dropdown-item" href="{{ route('cartas.edit',$carta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>							 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit" onclick="confirm('Deseas borrar la carta:  {{$carta->id}}? \nLa carta no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                {!! $cartas->links() !!}
            </div>
        </div>
    </div>
@endsection
