<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('numero_puerto') }}
            {{ Form::text('numero_puerto', $port->numero_puerto, ['class' => 'form-control' . ($errors->has('numero_puerto') ? ' is-invalid' : ''), 'placeholder' => 'Numero Puerto']) }}
            {!! $errors->first('numero_puerto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>