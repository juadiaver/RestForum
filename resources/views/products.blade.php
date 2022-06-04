@extends('layouts.app')

   
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        
	<div class="col-sm-9 ">	
    <div class="card-columns">
        @foreach($products as $product)
    <!-- Card 1 -->
    <div class="card h-50">
        <img class="card-img-top" src="/storage/{{$product->imagen}}" alt="Card image cap" width="400" height="200">
    <div class="card-header"><h4>{{ $product->nombre }}</h4></div>
    <div class="card-body">
        <p>{{ $product->descripcion }}</p>
        <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
    </div>
    </div>
    @endforeach
    
    
    </div>
    
    </div>


</div>
    
</div>


    
@endsection