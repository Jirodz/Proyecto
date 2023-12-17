<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $establecimiento->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_establecimiento') }}
            {{ Form::text('nombre_establecimiento', $establecimiento->nombre_establecimiento, ['class' => 'form-control' . ($errors->has('nombre_establecimiento') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Establecimiento']) }}
            {!! $errors->first('nombre_establecimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero_telefono') }}
            {{ Form::text('numero_telefono', $establecimiento->numero_telefono, ['class' => 'form-control' . ($errors->has('numero_telefono') ? ' is-invalid' : ''), 'placeholder' => 'Numero Telefono']) }}
            {!! $errors->first('numero_telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('encargado') }}
            {{ Form::text('encargado', $establecimiento->encargado, ['class' => 'form-control' . ($errors->has('encargado') ? ' is-invalid' : ''), 'placeholder' => 'Encargado']) }}
            {!! $errors->first('encargado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $establecimiento->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('desarrolladora') }}
            {{ Form::select('desarrolladora_id', $desarrolladoras, $establecimiento->desarrolladora_id, ['class' => 'form-control' . ($errors->has('desarrolladora_id') ? ' is-invalid' : ''), 'placeholder' => 'Desarrolladora']) }}
            {!! $errors->first('desarrolladora_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>