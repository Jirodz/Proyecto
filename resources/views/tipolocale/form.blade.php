<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipo_de_local') }}
            {{ Form::text('tipo_de_local', $tipolocale->tipo_de_local, ['class' => 'form-control' . ($errors->has('tipo_de_local') ? ' is-invalid' : ''), 'placeholder' => 'Tipo De Local']) }}
            {!! $errors->first('tipo_de_local', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>