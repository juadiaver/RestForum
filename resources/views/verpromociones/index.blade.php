@extends('layouts.app')

@section('template_title')
    Listado de las promociones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de las promociones') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Volver') }}
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
                    <br>
                    
                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Promociones</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promociones as $promocion)
                                        <tr>
											<td>{{ $promocion->nombre }}</td>
                                            <td>
                                                
                                                <div class="float-right">
                                                    <a href="{{ route('verpromociones.ver',$promocion->id) }}" class="btn btn-primary"  data-placement="left">
                                                        <i class="fa fa-fw fa-eye"></i> Ver
                                                    </a>
                                                  </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
