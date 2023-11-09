<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_odf') }}
            {{ Form::text('nombre_odf', $odf->nombre_odf, ['class' => 'form-control' . ($errors->has('nombre_odf') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Odf']) }}
            {!! $errors->first('nombre_odf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_odf') }}
            {{ Form::text('tipo_odf', $odf->tipo_odf, ['class' => 'form-control' . ($errors->has('tipo_odf') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Odf']) }}
            {!! $errors->first('tipo_odf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('establecimiento_id') }}
            {{ Form::select('establecimiento_id',$establecimientos, $odf->establecimiento_id, ['class' => 'form-control' . ($errors->has('establecimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Establecimiento Id']) }}
            {!! $errors->first('establecimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>