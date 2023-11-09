<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('numero_local') }}
            {{ Form::text('numero_local', $locale->numero_local, ['class' => 'form-control' . ($errors->has('numero_local') ? ' is-invalid' : ''), 'placeholder' => 'Numero Local']) }}
            {!! $errors->first('numero_local', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('establecimiento_id') }}
            {{ Form::select('establecimiento_id',$establecimientos, $locale->establecimiento_id, ['class' => 'form-control' . ($errors->has('establecimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Establecimiento Id']) }}
            {!! $errors->first('establecimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('odf_id') }}
            {{ Form::select('odf_id',$odfs, $locale->odf_id, ['class' => 'form-control' . ($errors->has('odf_id') ? ' is-invalid' : ''), 'placeholder' => 'Odf Id']) }}
            {!! $errors->first('odf_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('port_id') }}
            {{ Form::select('port_id',$ports, $locale->port_id, ['class' => 'form-control' . ($errors->has('port_id') ? ' is-invalid' : ''), 'placeholder' => 'Port Id']) }}
            {!! $errors->first('port_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>