<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('rif_companies') }}
            {{ Form::text('rif_companies', $companies->rif_companies, ['class' => 'form-control' . ($errors->has('rif_companies') ? ' is-invalid' : ''), 'placeholder' => 'rif de companies']) }}
            {!! $errors->first('rif_companies', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $companies->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre de la companies']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('description', $companies->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'describe a la companies']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero principal') }}
            {{ Form::text('num_contact', $companies->num_contact, ['class' => 'form-control' . ($errors->has('num_contact') ? ' is-invalid' : ''), 'placeholder' => 'Numero de contacto']) }}
            {!! $errors->first('num_contact', '<div class="invalid-feedback">:message</div>') !!}
        </div>
     
    </div>
    <div class="box-footer mt20 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

