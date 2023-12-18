<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $typeService->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de servicio']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">Nombre requerido</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio $') }}
            {{ Form::number('price', $typeService->price, ['class' => 'form-control' . ($errors->has('precio $') ? ' is-invalid' : ''), 'placeholder' => 'Valor', 'step' => 'any']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">Precio requerido</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20 text-center" style="padding-top:20px;">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</div>

