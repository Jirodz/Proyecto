<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipo_de_red') }}
            {{ Form::text('tipo_de_red', $tipo->tipo_de_red, ['class' => 'form-control' . ($errors->has('tipo_de_red') ? ' is-invalid' : ''), 'placeholder' => 'Tipo De Red']) }}
            {!! $errors->first('tipo_de_red', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>