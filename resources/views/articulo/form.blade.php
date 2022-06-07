<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $articulo->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $articulo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::select('categoria_id',$categorias, $articulo->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::number('precio', $articulo->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('orden') }}
            {{ Form::text('orden', $articulo->orden, ['class' => 'form-control' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
            {!! $errors->first('orden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activo: ') }} Si
            {{ Form::radio('activo', 'SI', true) }}
             No
            {{ Form::radio('activo', 'NO', false)}}
            
        </div>
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen',['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            @if (Storage::disk('s3')->has($articulo->imagen)==true)
            <img id="preview-image-before-upload" onerror="this.onerror=null; this.src='/storage/sinimagen.png'"  src="{{Storage::disk('s3')->url($articulo->imagen)}}"
            alt="Sin imagen" style="max-height: 200px;">
            @else
            <img id="preview-image-before-upload" onerror="this.onerror=null; this.src='/storage/sinimagen.png'"  src="{{Storage::disk('s3')->url('sinimagen.png')}}"
                alt="Sin imagen" style="max-height: 200px;">
            @endif
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
      
    $(document).ready(function (e) {
     
       
       $('#imagen').change(function(){
                
        let reader = new FileReader();
     
        reader.onload = (e) => { 
     
          $('#preview-image-before-upload').attr('src', e.target.result); 
        }
     
        reader.readAsDataURL(this.files[0]); 
       
       });
       
    });
     
</script>