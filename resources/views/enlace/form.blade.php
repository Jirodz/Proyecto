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
            {{ Form::label('tipo_id') }}
            {{ Form::text('tipo_id', $enlace->tipo_id, ['class' => 'form-control' . ($errors->has('tipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Id']) }}
            {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente_id') }}
            {{ Form::text('cliente_id', $enlace->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('establecimiento_id') }}
            {{ Form::text('establecimiento_id', $enlace->establecimiento_id, ['class' => 'form-control' . ($errors->has('establecimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Establecimiento Id']) }}
            {!! $errors->first('establecimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('local_id') }}
            {{ Form::text('local_id', $enlace->local_id, ['class' => 'form-control' . ($errors->has('local_id') ? ' is-invalid' : ''), 'placeholder' => 'Local Id']) }}
            {!! $errors->first('local_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('odf_id') }}
            {{ Form::text('odf_id', $enlace->odf_id, ['class' => 'form-control' . ($errors->has('odf_id') ? ' is-invalid' : ''), 'placeholder' => 'Odf Id']) }}
            {!! $errors->first('odf_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('port_id') }}
            {{ Form::text('port_id', $enlace->port_id, ['class' => 'form-control' . ($errors->has('port_id') ? ' is-invalid' : ''), 'placeholder' => 'Port Id']) }}
            {!! $errors->first('port_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('responsable_operador') }}
            {{ Form::text('responsable_operador', $enlace->responsable_operador, ['class' => 'form-control' . ($errors->has('responsable_operador') ? ' is-invalid' : ''), 'placeholder' => 'Responsable Operador']) }}
            {!! $errors->first('responsable_operador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dpi_responsable') }}
            {{ Form::text('dpi_responsable', $enlace->dpi_responsable, ['class' => 'form-control' . ($errors->has('dpi_responsable') ? ' is-invalid' : ''), 'placeholder' => 'Dpi Responsable']) }}
            {!! $errors->first('dpi_responsable', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_responsable') }}
            {{ Form::text('telefono_responsable', $enlace->telefono_responsable, ['class' => 'form-control' . ($errors->has('telefono_responsable') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Responsable']) }}
            {!! $errors->first('telefono_responsable', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>