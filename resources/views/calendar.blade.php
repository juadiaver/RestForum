@extends('layouts.pos')
@section('content')
<html>
  <head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body{
      font-family: 'Exo', sans-serif;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #EE192D;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:100px;
    }
    
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:100px;
      background-color: #ccd1ce;
    }
    </style>

  </head>
  <body>

    <div class="container">
        <div class="float-right">
        <a class="btn btn-primary" href="{{ route('reservas.create') }}"> Crear reserva</a>
        <a class="btn btn-primary" href="{{ route('reservas.index') }}"> Ir al indice</a>
    </div>
      <div style="height:50px"></div>
       
      <p class="lead">
      <h3>Calendario</h3>
      </p>

      <hr>

      <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="{{ asset('/calendar') }}/<?= $data['last']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
          </a>
          <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
          <a  href="{{ asset('/calendar') }}/<?= $data['next']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
          </a>
        </div>

      </div>
      <div class="row ">
        <div class="col header-col d-none d-sm-block">Lunes</div>
        <div class="col header-col d-none d-sm-block">Martes</div>
        <div class="col header-col d-none d-sm-block">Miercoles</div>
        <div class="col header-col d-none d-sm-block">Jueves</div>
        <div class="col header-col d-none d-sm-block">Viernes</div>
        <div class="col header-col d-none d-sm-block">Sabado</div>
        <div class="col header-col d-none d-sm-block">Domingo</div>
        <div class="col header-col d-block d-sm-none">L</div>
        <div class="col header-col d-block d-sm-none">M</div>
        <div class="col header-col d-block d-sm-none">M</div>
        <div class="col header-col d-block d-sm-none">J</div>
        <div class="col header-col d-block d-sm-none">V</div>
        <div class="col header-col d-block d-sm-none">S</div>
        <div class="col header-col d-block d-sm-none">D</div>
      </div>


      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)

          @if  ($dayweek['mes']==$mes)
            <div class="col box-day">
              {{ $dayweek['dia']  }}

              @php
                $day = $dayweek['dia'];
            @endphp
              <div>
            @if ($dayweek['pendientes']->count() >= 1)
            
            <button class="badge badge-danger d-none d-sm-block" type="button" data-toggle="modal" data-target="#Pendiente{{ $day }}">{{$dayweek['pendientes']->count() }}  Pendientes</button>
            <button class="badge badge-danger d-block d-sm-none" type="button" data-toggle="modal" data-target="#Pendiente{{ $day }}">{{$dayweek['pendientes']->count() }}</button>
            <div class="modal fade" id="Pendiente{{ $day }}" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="EjemploModalLabel">Pendientes {{$dayweek['dia']}}/{{$dayweek['mes']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @foreach  ($dayweek['pendientes'] as $reserva)
                            <div>
                                <a class="badge badge-primary" href="{{ asset('/reservas') }}/{{ $reserva->id }}">
                                    Reserva a nombre de {{$reserva->nombre}} : {{$reserva->comensales}} Pax, a las {{$reserva->hora}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>     
            @endif

            @if ($dayweek['confirmadas']->count() >= 1)
            <button class="badge badge-primary d-none d-sm-block" type="button" data-toggle="modal" data-target="#Confirmada{{ $day }}">{{$dayweek['confirmadas']->count() }} Confirmadas</button>
            <button class="badge badge-primary d-block d-sm-none" type="button" data-toggle="modal" data-target="#Confirmada{{ $day }}">{{$dayweek['confirmadas']->count() }} </button>
            <div class="modal fade" id="Confirmada{{ $day }}" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="EjemploModalLabel">Confirmadas {{$dayweek['dia']}}/{{$dayweek['mes']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @foreach  ($dayweek['confirmadas'] as $reserva)
                            <div>
                                <a class="badge badge-primary" href="{{ asset('/reservas') }}/{{ $reserva->id }}">
                                    Reserva a nombre de {{$reserva->nombre}} : {{$reserva->comensales}} Pax, a las {{$reserva->hora}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>   
            @endif

            @if ($dayweek['modificadas']->count() >= 1)
                <button class="badge badge-secondary d-none d-sm-block" type="button" data-toggle="modal" data-target="#Modificada{{ $day }}">{{$dayweek['modificadas']->count() }}  Modificadas</button>
            <button class="badge badge-secondary d-block d-sm-none" type="button" data-toggle="modal" data-target="#Modificada{{ $day }}">{{$dayweek['modificadas']->count() }}</button>
                <div class="modal fade" id="Modificada{{ $day }}" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="EjemploModalLabel">Modificadas {{$dayweek['dia']}}/{{$dayweek['mes']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                @foreach  ($dayweek['modificadas'] as $reserva)
                                <div>
                                    <a class="badge badge-primary" href="{{ asset('/reservas') }}/{{ $reserva->id }}">
                                        Reserva a nombre de {{$reserva->nombre}} : {{$reserva->comensales}} Pax, a las {{$reserva->hora}}
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
              
            </div>
            </div>
          @else
          <div class="col box-dayoff">
          </div>
          @endif


          @endforeach
        </div>
      @endforeach

    </div> 
    <br>

  </body>
</html>
@endsection