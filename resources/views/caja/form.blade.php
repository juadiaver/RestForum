<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dineroInicial') }}
            {{ Form::text('dineroInicial', $caja->dineroInicial, ['class' => 'form-control' . ($errors->has('dineroInicial') ? ' is-invalid' : ''), 'placeholder' => 'Dineroinicial']) }}
            {!! $errors->first('dineroInicial', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>