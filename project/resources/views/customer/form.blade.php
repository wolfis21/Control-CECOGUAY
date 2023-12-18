<div class="box box-info padding-1">
    <div class="box-body customer-form">
        
        <div class="form-group">
            {{ Form::label('Nombres') }}
            {{ Form::text('name', $customer->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba nombres']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">Nombres requeridos</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Apellidos') }}
            {{ Form::text('subname', $customer->subname, ['class' => 'form-control' . ($errors->has('subname') ? ' is-invalid' : ''), 'placeholder' => 'Escriba apellidos']) }}
            {!! $errors->first('subname', '<div class="invalid-feedback">Apellidos requeridos</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cedula') }}
            {{ Form::text('cedula', $customer->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Escriba cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">La Cedula es requerida</div>') !!}
        </div>
        <div class="form-group custom-from"> 
            {{ Form::label('fecha de nacimiento') }}
            {{ Form::date('date_n', $customer->date_n, ['class' => 'form-control' . ($errors->has('date_n') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de nacimiento']) }}
            {!! $errors->first('date_n', '<div class="invalid-feedback">Fecha de Nacimiento requerida</div>') !!}
        </div>
        <div class="form-group custom-from" >
            {{ Form::label('Sexo') }}
            {{ Form::select('sex', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $customer->sex, ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : '')]) }}
            {!! $errors->first('sex', '<div class="invalid-feedback">Seleccione Sexo</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado Civil') }}
            {{ Form::select('civil_status',['Solter@' => 'Solter@', 'Casad@' => 'Casad@', 'Viud@'=>'Viud@'],$customer->civil_status, ['class' => 'form-control' . ($errors->has('civil_status') ? ' is-invalid' : ''), 'placeholder' => 'Especifique estado']) }}
            {!! $errors->first('civil_status', '<div class="invalid-feedback">El estado civil es requerido</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Profesional') }}
            {{ Form::text('profession_status', $customer->profession_status, ['class' => 'form-control' . ($errors->has('profession_status') ? ' is-invalid' : ''), 'placeholder' => 'Describa']) }}
            {!! $errors->first('profession_status', '<div class="invalid-feedback">La profesion es requerido</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Direccion') }}
            {{ Form::text('address', $customer->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Escriba direccion']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">Direccion requerida</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telefono') }}
            {{ Form::text('phone', $customer->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Numero de contacto']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">Numero de telf. es requerido</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telf. fijo') }}
            {{ Form::text('landline', $customer->landline, ['class' => 'form-control' . ($errors->has('landline') ? ' is-invalid' : ''), 'placeholder' => 'Numero fijo']) }}
            {!! $errors->first('landline', '<div class="invalid-feedback">Numero fijo es requerido</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nacionalidad') }}
            {{ Form::text('nationality', $customer->nationality, ['class' => 'form-control' . ($errors->has('nationality') ? ' is-invalid' : ''), 'placeholder' => 'Nacionalidad']) }}
            {!! $errors->first('nationality', '<div class="invalid-feedback">Nacionalidad es requerida</div>') !!}
        </div>
        <div class="form-group custom-from">
            {{ Form::label('Fecha de Ingreso') }}
            {{ Form::date('date_admission', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_admission') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de ingreso']) }}
            {!! $errors->first('date_admission', '<div class="invalid-feedback">El nombre es requerido</div>') !!}
        </div>
        <div class="form-group add-img">
            {{ Form::label('Adjuntar Cedula') }} {{-- acomodar a file --}}
            {{ Form::file('img_cedula', $customer->img_cedula, ['class' => 'form-control' . ($errors->has('img_cedula') ? ' is-invalid' : ''), 'placeholder' => 'img_cedula']) }}
            {!! $errors->first('img_cedula', '<div class="invalid-feedback">Abjuntar img es requerido</div>') !!}
        </div>        
        <div class="form-group add-img">
            {{ Form::label('Adjuntar Partida') }} {{-- acomodar a file --}}
            {{ Form::file('img_partida_n', $customer->img_partida_n, ['class' => 'form-control' . ($errors->has('img_partida_n') ? ' is-invalid' : ''), 'placeholder' => 'img_partida_n']) }}
            {!! $errors->first('img_partida_n', '<div class="invalid-feedback">Abjuntar img es requerido</div>') !!}
        </div>
        
        <div class="form-group" style="    width: 26rem;>">
            <label>Agregar Oficina</label>
            <select name="offices_id" class="form-control"  id="office" >
                @if($offices->count() > 0)
                <option disable value="">N/a</option>
                     @foreach($offices as $office)
                         <option value="{{$office->id}}">{{$office->address}}</option>
                     @endforeach
                @endif
            </select>
        </div>
         
    </div>
    <div class="box-footer mt20 text-center" style="padding-top: 15px;">
        <button type="submit" class="btn btn-primary">Registrar</button>
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
    @media (max-width:1440px){
        .responsive-form{
            width: 45%;
        }
    }
    @media (max-width:1024px){
        .responsive-form{
            width: 60%;
        }
    }
</style>