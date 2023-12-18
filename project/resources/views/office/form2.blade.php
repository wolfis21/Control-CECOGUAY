
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Ubicacion de Oficina') }}
            {{ Form::text('address', $office->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'ingrese direccion']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero de Contacto') }}
            {{ Form::number('num_contact', $office->num_contact, ['class' => 'form-control' . ($errors->has('num_contact') ? ' is-invalid' : ''), 'placeholder' => 'contacto de sede']) }}
            {!! $errors->first('num_contact', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="statu">Agregar Empresa</label>
                <select name="companies_id" class="form-control"  id="empresa" >
                @if($companies->count() > 0)
                     {{-- <option disable value="{{$office_companies->id}}">{{$office_companies->name}}</option>  --}}
                     @foreach($companies as $company)
                         <option value="{{$company->id}}">{{$company->name}}</option>
                     @endforeach
                @endif
            </select>
        </div>

    </div>
    <div class="box-footer mt20 text-center" style="padding-top: 20px;">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>

