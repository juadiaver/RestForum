<div class="box box-info padding-1">
    <div class="box-body">
        <br>
        <div class="form-group">
            {{ Form::label('Efectivo') }}
            {{ Form::number('dineroInicial', $caja->dineroInicial, ['class' => 'form-control','step'=>'any' . ($errors->has('dineroInicial') ? ' is-invalid' : ''), 'placeholder' => 'Dineroinicial']) }}
            {!! $errors->first('dineroInicial', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Abrir</button>
    </div>
</div>