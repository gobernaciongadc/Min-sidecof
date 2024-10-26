<div class="">
    <div class="card-body">

        <div class="row g-3 mt-3">
            <div class="col-md-4">
                {{ Form::label('nombres') }}
                <span class="text-danger">*</span>
                {{ Form::text('nombres', $funcionario->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-md-4">
                {{ Form::label('carnet') }}
                <span class="text-danger">*</span>
                {{ Form::text('carnet', $funcionario->carnet, ['class' => 'form-control' . ($errors->has('carnet') ? ' is-invalid' : ''), 'placeholder' => 'Carnet']) }}
                {!! $errors->first('carnet', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4">
                {{ Form::label('cargo') }}
                <span class="text-danger">*</span>
                {{ Form::text('cargo', $funcionario->cargo, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
                {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-12">
                {{ Form::label('direccion') }}
                <span class="text-danger">*</span>
                {{ Form::text('direccion', $funcionario->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6">
                {{ Form::label('telefono') }}
                <span class="text-danger">*</span>
                {{ Form::text('telefono', $funcionario->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6">
                {{ Form::label('email') }}
                <span class="text-danger">*</span>
                {{ Form::text('email', $funcionario->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4">
                {{ Form::label('estado', 'Estado') }}
                <span class="text-danger">*</span>
                {{ Form::select('estado', ['Habilitado' => 'Habilitado', 'No habilitado' => 'No habilitado'], $funcionario->estado, ['class' => 'form-select' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between">
        <button type="submit" class="btn btn-primary text-uppercase">GUARDAR</button>
        <p>Todos los campos marcados con <span class="text-danger">(*)</span> son obligatorios</p>
    </div>
</div>