@extends('layouts.app')

@section('template_title')
    Create Datos Usuario
@endsection

@section('content')  

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto">

            @includeif('partials.errors')

            <div class="card card-default">
                
                <div class="card-body">    
      <h1>Formulario de contacto</h1>
        <h3>Escríbenos y en breve nos pondremos en contacto contigo</h3>

        <div class="box box-info padding-1">
            <div class="box-body">

            <form method="POST" action="{{ route('enviar.mail') }}"  role="form" enctype="multipart/form-data">
                            
                @csrf
            
                <p>
                  <label for="nombre" >Nombre
                    
                  </label>
                    <input type="text" name="nombre"  placeholder="Escribe tu nombre" class="form-control">
                </p>

                <p>
                    <label for="nombre" >Email
                      
                    </label>
                      <input type="email" name="mail"  placeholder="Escribe tu email" class="form-control">
                  </p>
              
                <p>
                    <label for="asunto" >Asunto
                      
                    </label>
                      <input type="text" name="asunto"  placeholder="Escribe el asunto" class="form-control">
                  </p>

                  <p>
                    <label for="contenido" >Contenido
                      
                    </label>
                    <textarea class="form-control" name="contenido"></textarea>
                  </p>

              
                  <div class="box-footer mt20">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            
            </form> 
        </div>  
    </div> 
    </div>  
  </div>

  @endsection