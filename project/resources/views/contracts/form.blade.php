@extends('layouts.app')

@section('template_title')
    {{ $customer->name ?? 'Datos Cliente:' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos Cliente:</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('customer.index') }}"> Volver</a>
                        </div>
                    </div>
                    {{-- Section contrato --}}
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Contrato No:</strong>
                            <div class="form-control">{{ $contract->id }}</div>
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Ingreso:</strong>
                            <div class="form-control">{{ $contract->date_admission }}</div>
                        </div>
                        <div class="form-group">
                            <strong>Tipo de contrato:</strong>
                            <div class="form-control">{{ $contract->typeService->name }}</div> {{-- acomodar para que sea un form --}}
                        </div>
{{--                         <div class="form-group">
                            {{ Form::label('Tipo de contrato:') }}
                            {{ Form::text('type_services_id', $contract->type_services_id, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escribas nombres']) }}
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div> --}}

                        <div class="form-group" style="    width: 26rem;>">
                            <label>Tipo de Contrato</label>
                            <select name="type_services_id" class="form-control"  >
                                @if($contract->count() > 0)
                                
                                     @foreach($type_Contracts as $type_Contract)
                                         <option value="{{$type_Contract->id}}">{{$type_Contract->name}}</option>
                                     @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="box-footer mt20 text-center" style="padding-top: 15px;">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>

                    </div>



                    {{-- section cliente --}}
                    <div class="title-customer">
                        <strong> Datos Cliente:</strong>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Cedula:</strong>
                            <div class="form-control">{{ $contract->customer->cedula }}</div>

                        </div>
                        <div class="form-group">
                            <strong>Apellidos y Nombres:</strong>
                            <div class="form-control">{{ $contract->customer->name }} {{ $contract->customer->subname }}</div>
                        </div>

                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            <div class="form-control">{{ $contract->customer->date_n }}</div>

                        </div>

                        <div class="form-group">
                            <strong>Telefono:</strong>
                            <div class="form-control">{{ $contract->customer->phone }}</div>

                        </div>

                        <div class="form-group">
                            <strong>Direccion:</strong>
                            <div class="form-control">{{ $contract->customer->address }}</div>

                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            <div class="form-control">{{ $contract->observaciones }}</div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <style>
        .float-right {
            float: inline-end;
            
        }
        .float-right a{
            font-size: 14px;
        }
        .form-control{
        font-size: 14px !important;
        }

        .card-body {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-evenly;
        }
    </style>
@endsection
