@extends('layouts.app')
<style>
    #producto {
        padding-right: 300px;
        padding-left: 300px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 3fr));
        grid-auto-rows: minmax(100px, auto);
        grid-gap: 50px;
      
    }
    @media only screen and (max-width: 768px) {
   #producto {
      margin-left:0 ;
      margin-right:0 ;
      padding-left:0 ;
      padding-right:0 ;
   }
}
    
    
  </style>
   
@section('content')

<div class="container-fluid">
    <div class="card">
    <div class="row justify-content-center">
        <nav class="navbar navbar-light float-right">
            <form class="form-inline">
          
              <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                <option>nombre</option>
                <option>categoria</option>
                <option>precio</option>
              </select>      
              <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por ..." aria-label="Search">

              <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
            </form> 
        </nav>
        </div> 

        
        <main id="producto">
            
        @foreach($articulos as $product)
            <article class="card">
                <img class="card-img-top" src="{{Storage::disk('s3')->url($product->imagen)}}" alt="Card image cap" width="400" height="200">
            <div class="card-header"><h4>{{ $product->nombre }}</h4></div>
            <div class="card-body">
            </div>
            <div class="card-footer ">
                <p>Precio : {{ $product->precio }} €</p>
                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Añadir al carrito</a> </p>
              </div>
            </article>
         @endforeach
    
    </main>
    
    </div>
    {!! $articulos->appends(["tipo" => $tipo,"buscarpor" => $buscar]) !!} 
</div>


    
@endsection