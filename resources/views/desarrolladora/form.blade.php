<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_desarrolladora') }}
            {{ Form::text('nombre_desarrolladora', $desarrolladora->nombre_desarrolladora, ['class' => 'form-control' . ($errors->has('nombre_desarrolladora') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Desarrolladora']) }}
            {!! $errors->first('nombre_desarrolladora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero_telefono') }}
            {{ Form::text('numero_telefono', $desarrolladora->numero_telefono, ['class' => 'form-control' . ($errors->has('numero_telefono') ? ' is-invalid' : ''), 'placeholder' => 'Numero Telefono']) }}
            {!! $errors->first('numero_telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('encargado') }}
            {{ Form::text('encargado', $desarrolladora->encargado, ['class' => 'form-control' . ($errors->has('encargado') ? ' is-invalid' : ''), 'placeholder' => 'Encargado']) }}
            {!! $errors->first('encargado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>