<div class="box box-info padding-1">
    <div class="box-body customer-form">
        <input type="hidden" name="contracts_id" value="{{ $contracts_Beneficiaries->id }}">

        <div class="form-group">
            {{ Form::label('Nombres') }}
            {{ Form::text('name', $beneficiaries->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escribas nombres']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Apellidos') }}
            {{ Form::text('subname', $beneficiaries->subname, ['class' => 'form-control' . ($errors->has('subname') ? ' is-invalid' : ''), 'placeholder' => 'Escriba apellidos']) }}
            {!! $errors->first('subname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cedula') }}
            {{ Form::text('cedula', $beneficiaries->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Escriba cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group custom-from"> 
            {{ Form::label('fecha de nacimiento') }}
            {{ Form::date('date_n', $beneficiaries->date_n, ['class' => 'form-control' . ($errors->has('date_n') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de nacimiento']) }}
            {!! $errors->first('date_n', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group custom-from" >
            {{ Form::label('Sexo') }}
            {{ Form::select('sex', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $beneficiaries->sex, ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : '')]) }}
            {!! $errors->first('sex', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado Civil') }}
            {{ Form::select('civil_status',['Solter@' => 'Solter@', 'Casad@' => 'Casad@', 'Viud@'=>'Viud@'],$beneficiaries->civil_status, ['class' => 'form-control' . ($errors->has('civil_status') ? ' is-invalid' : ''), 'placeholder' => 'Especifique estado']) }}
            {!! $errors->first('civil_status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Profesional') }}
            {{ Form::text('professional_status', $beneficiaries->professional_status, ['class' => 'form-control' . ($errors->has('professional_status') ? ' is-invalid' : ''), 'placeholder' => 'Describa']) }}
            {!! $errors->first('profession_status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Direccion') }}
            {{ Form::text('address', $beneficiaries->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Escriba direccion']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telefono') }}
            {{ Form::text('phone', $beneficiaries->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Numero de contacto']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telf. fijo') }}
            {{ Form::text('landline', $beneficiaries->landline, ['class' => 'form-control' . ($errors->has('landline') ? ' is-invalid' : ''), 'placeholder' => 'Numero fijo']) }}
            {!! $errors->first('landline', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nacionalidad') }}
            {{ Form::text('nationality', $beneficiaries->nationality, ['class' => 'form-control' . ($errors->has('nationality') ? ' is-invalid' : ''), 'placeholder' => 'Nacionalidad']) }}
            {!! $errors->first('nationality', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group custom-from">
            {{ Form::label('Fecha de Ingreso') }}
            {{ Form::date('date_admission', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_admission') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de ingreso']) }}
            {!! $errors->first('date_admission', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group add-img">
            {{ Form::label('Adjuntar Cedula') }} 
            {{ Form::file('img_cedula', ['class' => 'form-control' . ($errors->has('img_cedula') ? ' is-invalid' : ''), 'placeholder' => 'img_cedula']) }}
            {!! $errors->first('img_cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group add-img">
            {{ Form::label('Adjuntar Partida') }} 
            {{ Form::file('img_partida_n', ['class' => 'form-control' . ($errors->has('img_partida_n') ? ' is-invalid' : ''), 'placeholder' => 'img_partida_n']) }}
            {!! $errors->first('img_partida_n', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group custom-from" >
            {{ Form::label('Parentesco') }}
            {{ Form::select('parentesco', ['Abuela' => 'Abuela', 'Abuelo' => 'Abuelo','Aportante' => 'Aportante','Aportante Fallecid@' => 'Aportante Fallecid@','Aportante (F)' => 'Aportante (F)','Aportante (M)' => 'Aportante (M)','Conyuge (F)' => 'Conyuge (F)','Conyuge (M)' => 'Conyuge (M)','Conyuge Fallecid@' => 'Conyuge Fallecid@','Cuñada' => 'Cuñada','Cuñado' => 'Cuñado','Hermana' => 'Hermana','Hermano' => 'Hermano','Padre' => 'Padre','Madre' => 'Madre'], $beneficiaries->sex, ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : '')]) }}
            {!! $errors->first('parentesco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         
    </div>
    <div class="box-footer mt20 text-center" style="padding-top: 15px;">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>

<style type="text/css">
    .customer-form{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-evenly;
    }
    .customer-form .form-group{
        margin-top: 5px;
    }
    .customer-form .form-group.custom-from {
        width: 11.5rem; 
        margin-top: 5px;
    }
    .form-control{
        font-size: 14px !important;
    }
    .customer-form .form-group.add-img{
        margin-top: 15px;
    }
    label{
        font-weight: bold;
    }
</style>