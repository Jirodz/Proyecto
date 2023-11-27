<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_rack') }}
            {{ Form::text('nombre_rack', $rack->nombre_rack, ['class' => 'form-control' . ($errors->has('nombre_rack') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Rack']) }}
            {!! $errors->first('nombre_rack', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_rack') }}
            {{ Form::text('tipo_rack', $rack->tipo_rack, ['class' => 'form-control' . ($errors->has('tipo_rack') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Rack']) }}
            {!! $errors->first('tipo_rack', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('establecimiento_id') }}
            {{ Form::text('establecimiento_id', $rack->establecimiento_id, ['class' => 'form-control' . ($errors->has('establecimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Establecimiento Id']) }}
            {!! $errors->first('establecimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>