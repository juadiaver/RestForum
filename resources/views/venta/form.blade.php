<div class="box box-info padding-1">
    <div class="box-body">
        
    
        <div class="form-group">
            {{ Form::label('mesa_id') }}
            {{ Form::select('mesa_id',$mesas, $venta->mesa_id, ['class' => 'form-control' . ($errors->has('mesa_id') ? ' is-invalid' : ''), 'placeholder' => 'Mesa Id']) }}
            {!! $errors->first('mesa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $venta->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modo_pago') }}
            {{ Form::text('modo_pago', $venta->modo_pago, ['class' => 'form-control' . ($errors->has('modo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Modo Pago']) }}
            {!! $errors->first('modo_pago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ticket') }}
            {{ Form::file('ticket', ['class' => 'form-control' . ($errors->has('ticket') ? ' is-invalid' : ''), 'placeholder' => 'Ticket']) }}
            {!! $errors->first('ticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>