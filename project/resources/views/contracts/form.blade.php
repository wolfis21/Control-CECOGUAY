
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Fecha de admisión') }}
            {{ Form::date('date_admission', $contracts->date_admission, ['class' => 'form-control' . ($errors->has('date_admission') ? ' is-invalid' : ''), 'placeholder' => 'Modifique fecha']) }}
            {!! $errors->first('date_admission', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Costo Semanal') }}
            {{ Form::number('cost_semanal', $contracts->cost_semanal, ['class' => 'form-control' . ($errors->has('cost_semanal') ? ' is-invalid' : ''), 'placeholder' => 'cuota semanal']) }}
            {!! $errors->first('cost_semanal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('semana_cobro', 'Semanas de Cobro') }}
            {{ Form::text('semana_cobro', $contracts->semana_cobro, ['class' => 'form-control' . ($errors->has('semana_cobro') ? ' is-invalid' : ''), 'placeholder' => 'Semana n del mes']) }}
            {!! $errors->first('semana_cobro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('atrasos', 'Semanas de Atrasos') }}
            {{ Form::number('atrasos', $contracts->atrasos, ['class' => 'form-control' . ($errors->has('atrasos') ? ' is-invalid' : ''), 'placeholder' => 'n. de atrasos']) }}
            {!! $errors->first('atrasos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="statu">Suspendido</label>
                <select name="suspendido" class="form-control"  id="suspendido" >
                    <option value="Si">Si</option>
                    <option value="No">No</option>
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('Observaciones') }}
            {{ Form::text('observaciones', $contracts->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'describe una observacion']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="statu">Tipo de Servicio</label>
                <select name="type_services_id" class="form-control"  id="services" >
                     @foreach($type_Contracts as $type_Contract)
                         <option value="{{$type_Contract->id}}">{{ $type_Contract->name }}</option>
                     @endforeach
                
            </select>
        </div>
        <div class="form-group">
            <label for="statu">Cliente Responsable</label>
                <select name="customers_id" class="form-control"  id="customers" >
                    @if($customer)
                    <option value="{{$customer->id}}">{{ $customer->name }} {{ $customer->subname }}</option>
                @endif
            </select>
        </div>
    </div>
    <div class="box-footer mt20 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</div>

