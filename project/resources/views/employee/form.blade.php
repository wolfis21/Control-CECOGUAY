<div class="box box-info padding-1">
    <div class="box-body" style="    display: flex; flex-wrap: wrap; justify-content: space-between;">
        
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $employee->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('Apellido') }}
            {{ Form::text('subname', $employee->subname, ['class' => 'form-control' . ($errors->has('subname') ? ' is-invalid' : ''), 'placeholder' => 'Escriba apellido']) }}
            {!! $errors->first('subname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('Cedula') }}
            {{ Form::text('cedula', $employee->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Escriba cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="    padding-top: 10px;     width: 13rem;"> {{-- 
                                    colocar un calendario chingon como en nuria con jquery etc
                                    --}}
            {{ Form::label('fecha de nacimiento') }}
            {{ Form::date('date_n', $employee->date_n, ['class' => 'form-control' . ($errors->has('date_n') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('date_n', '<div class="invalid-feedback">:message</div>') !!}
        </div>
     
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('direccion') }}
            {{ Form::text('address', $employee->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Escriba direccion']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group" style="    padding-top: 10px;">
            {{ Form::label('telefono') }}
            {{ Form::text('phone', $employee->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Escriba n. telefono']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

        <div class="form-group" style="    padding-top: 10px; width: 28rem;">
            <label for="statu">Pertenece a la Oficina</label>
            <select name="offices_id" class="form-control"  id="office" >
                @if($office->count() > 0)
                     <option disable value="">N/a</option>
                     @foreach($office as $ofi)
                         <option value="{{$ofi->id}}">{{$ofi->address}}</option>
                     @endforeach
                @endif
            </select>
        </div>
         
    </div>
    <div class="box-footer mt20 text-center" style="    padding-top: 15px;">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</div>