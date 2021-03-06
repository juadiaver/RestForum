<div class="box box-info padding-1">
    <form >
        <div class="box-body">
            <div class="card-body">
                <h2>Selecciona la categoria.</h2>
                <div class="row">
                
                @foreach ($categorias as $categoria)
                <div class="card" style="width: 11rem;">
                    <button name="buscar" value="{{$categoria->id }}" type="submit"><img src="{{Storage::disk('s3')->url($categoria->imagen)}}" width="150" height="150"></button>
                </div>   
                @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="card-body">
            <div class="row">
                
            @foreach ($articulos as $articulo)
               
            <div class="card" style="width: 18rem;">
                
                <button name="anadir" value="{{$articulo->id }}" type="submit"><img class="card-img-top" src="{{Storage::disk('s3')->url($articulo->imagen)}}" width="200" height="200" alt="Card image cap"></button>
                <div class="card-body">
                  <h5 class="card-title">{{$articulo->nombre}}</h5>
                </div>
              </div>
            
            @endforeach 
        
            </div>
            <br>
            {!! $articulos->appends(["buscar" => $cat]) !!} 
            </div>
        </div>
    </form>
        
        @php
            $precioTotal = 0;
        @endphp
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Precio total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @forelse ($mesa->articulos as $articulos)
                <tbody>
                    
                    @php
                        $precioTotal = $precioTotal+$articulos->precio*$articulos->pivot->cantidad;
                    @endphp 
                        <tr>

                            <td>{{ $articulos->nombre }}</td>
                            <td>{{ number_format($articulos->precio, 2, ',', '.')}} ???</td>
                            <td>{{$articulos->pivot->cantidad}}</td>
                            <td>{{number_format($articulos->precio*$articulos->pivot->cantidad, 2, ',', '.')}} ???</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('pos.destroy',$articulos->id) }}" method="POST">
                                    <input type="hidden" name="mesa" value="{{ $mesa->id }}">    
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">							 
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit" onclick="return confirm('Deseas borrar el articulo:  {{$articulo->nombre}}? \nEl articulo no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar Todo
                                        </button>
                                    <button class="dropdown-item" value="{{ $articulos->id }}" name="borrarUno" type="submit" onclick="return confirm('Deseas borrar el articulo:  {{$articulo->nombre}}? \nEl articulo no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar Uno </button>   
                                    </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                </tbody>

                @empty
                <div class="columns">
                    <div class="column">
                        <h1 class="is-size-1">No hay articulos en la mesa</h1>
                    </div>
          
                </div>
                @endforelse
                @if($precioTotal>0)
                <h1>Total : {{number_format($precioTotal, 2, ',', '.')}}??? </h1>
                <div class="box-footer mt20">
                    <a class="btn btn-primary" href="{{ route('pos.pago',$mesa->id) }}"> PAGAR</a>
                    <a class="btn btn-primary" href="{{ route('pos.index') }}"> GUARDAR</a>
                </div> 
                <br>
                @endif    
            </table>
        </div>
    </div>
</div>