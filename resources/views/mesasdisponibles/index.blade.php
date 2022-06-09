@extends('layouts.app')

@section('template_title')
    Listado menus y cartas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mesas Disponibles') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Volver') }}
                                </a>
                              </div>

                        </div>
                    </div>
                    <br>
                    <div class="col-md-3 mx-auto">
                    <div  class="btn btn-success col-12 text-dark">
                        Mesas disponibles : {{ $mesasDisponibles }}
                    </div>
                    <br>
                    <br>
                    <div  class="btn btn-danger col-12 text-dark">
                        Mesas ocupadas : {{$mesasOcupadas}}
                    </div>
                    <br>
                    <br>
                    <div  class="btn btn-warning col-12 text-dark">
                        Mesas totales : {{$mesasTotales}}
                    </div>
                   
                    <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
