<div class="">
    <div class="card-body">

        <div class="row g-3 mt-3">

            <div class="col-md-4">
                {{ Form::label('nombre') }}
                <span class="text-danger">*</span>
                {{ Form::text('nombre', $nometalico->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4">
                {{ Form::label('simbolo') }}
                <span class="text-danger">*</span>
                {{ Form::text('simbolo', $nometalico->simbolo, ['class' => 'form-control' . ($errors->has('simbolo') ? ' is-invalid' : ''), 'placeholder' => 'Simbolo']) }}
                {!! $errors->first('simbolo', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-md-4">
                {{ Form::label('alicuota') }}
                <span class="text-danger">*</span>
                {{ Form::number('alicuota', $nometalico->alicuota, ['class' => 'form-control' . ($errors->has('alicuota') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su alicuota','step' => 'any']) }}
                {!! $errors->first('alicuota', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-md-4">
                {{ Form::label('estado', 'Estado') }}
                <span class="text-danger">*</span>
                {{ Form::select('estado', ['Habilitado' => 'Habilitado', 'No habilitado' => 'No habilitado'], $nometalico->estado, ['class' => 'form-select' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <!-- <div class="form-group">
                {{ Form::label('users_id') }}
                {{ Form::text('users_id', $nometalico->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
                {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
            </div> -->
        </div>

    </div>
    <div class="card-footer d-flex justify-content-between">
        <button type="submit" class="btn btn-primary text-uppercase">GUARDAR</button>
        <p>Todos los campos marcados con <span class="text-danger">(*)</span> son obligatorios</p>
    </div>
</div>