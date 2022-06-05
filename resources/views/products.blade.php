@extends('layouts.app')

   
@section('content')

<div class="container-fluid">
    <div class="card">
    <div class="row justify-content-center">
        <nav class="navbar navbar-light float-right">
            <form class="form-inline">
          
              <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                <option>nombre</option>
                <option>categoria</option>
                <option>activo</option>
                <option>precio</option>
              </select>      
              <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por ..." aria-label="Search">

              <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
            </form> 
        </div> 
     <div class="row justify-content-center">  
	<div class="col-sm-9 ">	
    <div class="card-columns">
        @foreach($articulos as $product)
    <!-- Card 1 -->
    <div class="card">
        <img class="card-img-top" src="/storage/{{$product->imagen}}" alt="Card image cap" width="400" height="200">
    <div class="card-header"><h4>{{ $product->nombre }}</h4></div>
    <div class="card-body">
        <p>Precio : {{ $product->precio }} €</p>
        <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Añadir al carrito</a> </p>
    </div>
    </div>
    @endforeach
    
    
    </div>
    {!! $articulos->appends(["tipo" => $tipo,"buscarpor" => $buscar]) !!} 
    </div>


</div>
    
</div>


    
@endsection