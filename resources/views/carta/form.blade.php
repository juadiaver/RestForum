<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $carta->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activa') }}
            {{ Form::select('activa', $estado,$carta->activa, ['class' => 'form-control' . ($errors->has('activa') ? ' is-invalid' : ''), 'placeholder' => 'Activa']) }}
            {!! $errors->first('activa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contenido') }}
            
            <textarea id="mytextarea" name="contenido">{{$carta->contenido}}</textarea>
 
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>