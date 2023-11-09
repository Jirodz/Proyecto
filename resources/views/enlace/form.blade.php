<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('actividad') }}
            {{ Form::text('actividad', $enlace->actividad, ['class' => 'form-control' . ($errors->has('actividad') ? ' is-invalid' : ''), 'placeholder' => 'Actividad']) }}
            {!! $errors->first('actividad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('negocio') }}
            {{ Form::text('negocio', $enlace->negocio, ['class' => 'form-control' . ($errors->has('negocio') ? ' is-invalid' : ''), 'placeholder' => 'Negocio']) }}
            {!! $errors->first('negocio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_contacto') }}
            {{ Form::text('nombre_contacto', $enlace->nombre_contacto, ['class' => 'form-control' . ($errors->has('nombre_contacto') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Contacto']) }}
            {!! $errors->first('nombre_contacto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $enlace->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nivel') }}
            {{ Form::text('nivel', $enlace->nivel, ['class' => 'form-control' . ($errors->has('nivel') ? ' is-invalid' : ''), 'placeholder' => 'Nivel']) }}
            {!! $errors->first('nivel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente_id') }}
            {{ Form::select('cliente_id',$clientes, $enlace->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('establecimiento_id') }}
            {{ Form::select('establecimiento_id',$establecimientos, $enlace->establecimiento_id, ['class' => 'form-control' . ($errors->has('establecimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Establecimiento Id']) }}
            {!! $errors->first('establecimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('local_id') }}
            {{ Form::select('local_id',$locales, $enlace->local_id, ['class' => 'form-control' . ($errors->has('local_id') ? ' is-invalid' : ''), 'placeholder' => 'Local Id']) }}
            {!! $errors->first('local_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('odf_id') }}
            {{ Form::select('odf_id',$odfs, $enlace->odf_id, ['class' => 'form-control' . ($errors->has('odf_id') ? ' is-invalid' : ''), 'placeholder' => 'Odf Id']) }}
            {!! $errors->first('odf_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('port_id') }}
            {{ Form::select('port_id',$ports, $enlace->port_id, ['class' => 'form-control' . ($errors->has('port_id') ? ' is-invalid' : ''), 'placeholder' => 'Port Id']) }}
            {!! $errors->first('port_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>