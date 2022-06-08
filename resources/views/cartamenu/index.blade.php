@extends('layouts.app')

@section('template_title')
    Listado menus y cartas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de menus y cartas') }}
                            </span>

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
										<th>Cartas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartas as $carta)
                                        <tr>
											<td>{{ $carta->nombre }}</td>
                                            <td>
                                                
                                                <div class="float-right">
                                                    <a href="{{ route('cartamenu.carta',$carta->id) }}" class="btn btn-primary"  data-placement="left">
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Menus</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
											<td>{{ $menu->nombre }}</td>
                                            <td>
                                                
                                                <div class="float-right">
                                                    <a href="{{ route('cartamenu.menu',$menu->id) }}" class="btn btn-primary"  data-placement="left">
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
                </div>
            </div>
        </div>
    </div>
@endsection
