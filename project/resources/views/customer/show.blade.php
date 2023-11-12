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

                    {{-- section cliente --}}
                    <div class="title-customer">
                        Datos Cliente:
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Cedula:</strong>
                            <div class="form-control">{{ $customer->cedula }}</div>

                        </div>
                        <div class="form-group">
                            <strong>Apellidos y Nombres:</strong>
                            <div class="form-control">{{ $customer->subname }} {{ $customer->name }}</div>
                        </div>
{{--                         <div class="form-group">
                            <strong>Apellidos:</strong>
                            <div class="form-control">{{ $customer->subname }}</div>

                        </div> --}}
                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            <div class="form-control">{{ $customer->date_n }}</div>

                        </div>

                        <div class="form-group">
                            <strong>Direccion:</strong>
                            <div class="form-control">{{ $customer->address }}</div>

                        </div>

                        <div class="form-group">
                            <strong>Telefono:</strong>
                            <div class="form-control">{{ $customer->phone }}</div>

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
