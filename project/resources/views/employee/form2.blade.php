<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cedula') }}
            {{ Form::text('cedula', $employee->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('name', $employee->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre employee']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('subname', $employee->subname, ['class' => 'form-control' . ($errors->has('subname') ? ' is-invalid' : ''), 'placeholder' => 'apellido employee']) }}
            {!! $errors->first('subname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group"> {{-- 
                                    colocar un calendario chingon como en nuria con jquery etc
                                    --}}
            {{ Form::label('fecha de nacimiento') }}
            {{ Form::date('date_n', $employee->date_n, ['class' => 'form-control' . ($errors->has('date_n') ? ' is-invalid' : ''), 'placeholder' => 'fecha de nacimiento']) }}
            {!! $errors->first('date_n', '<div class="invalid-feedback">:message</div>') !!}
        </div>
     
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('address', $employee->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('phone', $employee->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

        <div class="form-group">
            <label for="statu">Agregar Oficina</label>
            <select name="offices_id" class="form-control"  id="office" >
                @if($office->count() > 0)
                     <option disable value="">N/a</option>
                     @foreach($office as $ofi)
                         <option value="{{$ofi->id}}">{{$ofi->address}}</option>
                     @endforeach
                @endif
            </select>
        </div>
     

{{--         <div class="form-group"> //pensar esto form
            <label for="statu">Agregar Zona</label>
            <select name="offices_id" class="form-control"  id="office" >
                @if($office->count() > 0)
                     <option value="{{$ofi->id}}">{{$ofi->address}}</option>
                     @foreach($office as $ofi)
                        @if($office_employee->address != $ofi->address)
                         <option value="{{$ofi->id}}">{{$ofi->address}}</option>
                         @endif                    
                     @endforeach
                @endif
            </select>
        </div> --}}
         
    </div>
    <div class="box-footer mt20 text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>