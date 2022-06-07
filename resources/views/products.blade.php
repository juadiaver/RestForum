@extends('layouts.app')
<style>
    .producto {
        padding-right: 300px;
        padding-left: 300px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 3fr));
        grid-auto-rows: minmax(100px, auto);
        grid-gap: 50px;
      
    }
    @media only screen and (max-width: 768px) {
   .producto {
      margin-left:0 ;
      margin-right:0 ;
      padding-left:0 ;
      padding-right:0 ;
   }
}

html {
      min-height: 100%;
      position: relative;
    }
    body {
      margin: 0;
      margin-bottom: 50px;
      background: #23EC55;
background: -webkit-radial-gradient(top right, #23EC55, #2D51C1);
background: -moz-radial-gradient(top right, #23EC55, #2D51C1);
background: radial-gradient(to bottom left, #23EC55, #2D51C1);
    }
    footer {
      
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 80px;
      
    }

    .thumbnail {
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
}
.thumbnail img {
    width: 80%;
}
.thumbnail .caption{
    margin: 7px;
}
.main-section{
    background-color: #343a40;
}
.dropdown{
    float:right;
    
}
.btn{
    border:0px;
    
    box-shadow:none !important;
}
.dropdown .dropdown-menu{
    padding:20px;
    
    width:300px !important;
    
    box-shadow:0px 5px 30px black;
}


.total-header-section{
    border-bottom:1px solid #d2d2d2;
}
.total-section p{
    margin-bottom:20px;
}
.cart-detail{
    padding:15px 0px;
}
.cart-detail-img img{
    width:100%;
    height:100%;
    padding-left:15px;
}
.cart-detail-product p{
    margin:0px;
    color:#000;
    font-weight:500;
}
.cart-detail .price{
    font-size:12px;
    margin-right:10px;
    font-weight:500;
}
.cart-detail .count{
    color:#C2C2DC;
}
.checkout{
    border-top:1px solid #d2d2d2;
    padding-top: 15px;
}
.checkout .btn-primary{
    border-radius:50px;
    height:50px;
}
.dropdown-menu:before{
    
    position:absolute;
    top:-20px;
    right:50px;
    border:10px solid transparent;
    border-bottom-color:#fff;
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

        
        <main class="producto">
            
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