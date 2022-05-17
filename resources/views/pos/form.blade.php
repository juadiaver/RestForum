<div class="box box-info padding-1">
    <div class="box-body">
        <form >

            
            <div class="card-body">
                <h2>Selecciona la categoria.</h2>
                <div class="row">
                
                @foreach ($categorias as $categoria)
                <div class="card" style="width: 11rem;">
                    <button name="buscar" value="{{$categoria->id }}" type="submit"><img src="/storage/{{$categoria->imagen}}" width="150" height="150"></button>
                </div>   
                @endforeach
            </div>
                </div>
         
          
        
        </div>
        
        <div class="card-body">
            <div class="row">
                
            @foreach ($articulos as $articulo)
               
            <div class="card" style="width: 18rem;">
                
                <button name="anadir" value="{{$articulo->id }}" type="submit"><img class="card-img-top" src="/storage/{{$articulo->imagen}}" width="200" height="200" alt="Card image cap"></button>
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
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">PAGAR</button>
            <button type="submit" class="btn btn-primary">GUARDAR</button>
        </div>
    <br>
    <h2>Resumen pedido</h2>
    
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
                            <td>{{ $articulos->precio }} €</td>
                            <td>{{$articulos->pivot->cantidad}}</td>
                            <td>{{$articulos->precio*$articulos->pivot->cantidad}} €</td>
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
                                    <button class="dropdown-item" type="submit" onclick="return confirm('Deseas borrar el articulo:  {{$articulo->nombre}}? \nEl articulo no podra recuperarse!')||event.preventDefault()"><i class="fa fa-trash"></i> Borrar </button>   
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
                    <h1>Total : {{$precioTotal}}€ </h1>
            </table>
        </div>
    </div>
</div>