<div class="box box-info padding-1">
    <div class="box-body">
        <input type="hidden" name="id" value="{{ $companies->id }}">
        <div class="form-group">
            {{ Form::label('RIF Empresa') }}
            {{ Form::text('rif_companies', $companies->rif_companies, ['class' => 'form-control' . ($errors->has('rif_companies') ? ' is-invalid' : ''), 'placeholder' => 'Escriba RIF']) }}
            {!! $errors->first('rif_companies', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $companies->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('Descripcion') }}
            {{ Form::text('description', $companies->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion breve']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('Numero principal') }}
            {{ Form::text('num_contact', $companies->num_contact, ['class' => 'form-control' . ($errors->has('num_contact') ? ' is-invalid' : ''), 'placeholder' => 'Escriba n. contacto']) }}
            {!! $errors->first('num_contact', '<div class="invalid-feedback">:message</div>') !!}
        </div>
     
    </div>
    <div class="box-footer mt20 text-center" style="    padding-top: 12px;">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>

