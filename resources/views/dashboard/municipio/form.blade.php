<!-- Extender main -->

<div class="">
    <div class="card-body">
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                {{ Form::label('codigo') }}
                <span class="text-danger">*</span>
                {{ Form::text('codigo', $municipio->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese codigo municipio']) }}
                {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6">
                {{ Form::label('municipio') }}
                <span class="text-danger">*</span>
                {{ Form::text('municipio', $municipio->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'ingrese municipio']) }}
                {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4">
                {{ Form::label('estado', 'Estado') }}
                <span class="text-danger">*</span>
                {{ Form::select('estado', ['Habilitado' => 'Habilitado', 'No habilitado' => 'No habilitado'], $municipio->estado, ['class' => 'form-select' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <!-- <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $municipio->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <button type="submit" class="btn btn-primary text-uppercase">GUARDAR</button>
        <p>Todos los campos marcados con <span class="text-danger">(*)</span> son obligatorios</p>
    </div>


</div>