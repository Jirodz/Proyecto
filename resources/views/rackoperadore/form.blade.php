<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('rack_operador') }}
            {{ Form::text('rack_operador', $rackoperadore->rack_operador, ['class' => 'form-control' . ($errors->has('rack_operador') ? ' is-invalid' : ''), 'placeholder' => 'Rack Operador']) }}
            {!! $errors->first('rack_operador', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('establecimiento_id') }}
            {{ Form::select('establecimiento_id',$establecimientos, $rackoperadore->establecimiento_id, ['class' => 'form-control' . ($errors->has('establecimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Establecimiento Id']) }}
            {!! $errors->first('establecimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>