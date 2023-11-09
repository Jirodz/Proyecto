<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('operador') }}
            {{ Form::text('operador', $operadore->operador, ['class' => 'form-control' . ($errors->has('operador') ? ' is-invalid' : ''), 'placeholder' => 'Operador']) }}
            {!! $errors->first('operador', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>