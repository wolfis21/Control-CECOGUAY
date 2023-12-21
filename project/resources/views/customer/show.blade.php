@extends('layouts.app')

@section('template_title')
    {{ $customer->name ?? 'Datos Cliente:' }}
@endsection

@section('content')
    <div class="main" id="main" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <span class="card-title">Datos Cliente:</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('customer.index') }}"> Volver</a>
                            </div>
                        </div>
                    </div>

                    {{-- section cliente --}}
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $customer->cedula }}

                        </div>
                        <div class="form-group">
                            <strong>Apellidos y Nombres:</strong>
                            {{ $customer->subname }} {{ $customer->name }}
                        </div>

                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            {{ $customer->date_n }}

                        </div>

                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $customer->address }}

                        </div>

                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $customer->phone }}

                        </div>

                        <div class="form-group img-custom">
                            <strong>cedula:</strong>
                            <a href="{{ asset('storage/' . $customer->img_cedula) }}" target="_blank">
                                <img style="    width: 15rem;" src="{{ asset('storage/' . $customer->img_cedula) }}" alt="Cédula">
                            </a>
                        </div>

                        <div class="form-group img-custom">
                            <strong>partida:</strong>
                            <a href="{{ asset('storage/' . $customer->img_partida_n) }}" target="_blank">
                                <img style="    width: 15rem;" src="{{ asset('storage/' . $customer->img_partida_n) }}" alt="Partida de nacimiento">
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

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
            flex-direction: column;
        }
        .img-custom{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
@endsection
