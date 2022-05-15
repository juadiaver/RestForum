<div class="box box-info padding-1">
    <div class="box-body">
        <form class="form-inline">

            
            <div class="card-body">
                <div class="row">
                @foreach ($categorias as $categoria)
                <div class="card" style="width: 11rem;">
                    <button name="buscar" value="{{$categoria->id }}" type="submit"><img src="/storage/{{$categoria->imagen}}" width="150" height="150"></button>
                </div>   
                @endforeach
            </div>
                </div>
               
          </form>
        
        </div>
        <div class="card-body">
            <div class="row">
                
            @foreach ($articulos as $articulo)

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/storage/{{$articulo->imagen}}" width="200" height="200" alt="Card image cap">
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
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">PAGAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </div>

    <div class="card-body">
        <div class="row">
            
        @foreach ($mesa->articulos as $articulos)

        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$articulos->nombre}}</h5>
            </div>
          </div>
        @endforeach 
        </div>
        
        </div>
    </div>
</div>