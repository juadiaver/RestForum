<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::select('user_id',$user, $pedido->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::number('precio', $pedido->precio, ['class' => 'form-control','step'=>'any' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modo_pago') }}
            {{ Form::text('modo_pago', $pedido->modo_pago, ['class' => 'form-control' . ($errors->has('modo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Modo Pago']) }}
            {!! $errors->first('modo_pago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ticket') }}
            {{ Form::file('ticket', ['class' => 'form-control' . ($errors->has('ticket') ? ' is-invalid' : ''), 'placeholder' => 'Ticket']) }}
            {!! $errors->first('ticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            Pendiente
            {{ Form::radio('estado', 'Pendiente', true) }}
            En curso
            {{ Form::radio('estado', 'En curso', true) }}
            Terminado
            {{ Form::radio('estado', 'Terminado', false)}}
            
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $pedido->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>