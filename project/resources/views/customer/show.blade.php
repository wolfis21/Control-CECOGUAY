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
                            <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                    {{-- //arreglar esto aca --}}
                    <div class="form-group">
                        <strong>Nombres:</strong>
                        {{ $customer->name }}
                    </div>                    
                    <div class="form-group">
                        <strong>Apellidos:</strong>
                        {{ $customer->subname }}
                    </div>
                    <div class="form-group">
                        <strong>Cedula:</strong>
                        {{ $customer->cedula }}
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
                        
                        <div class="form-group">
                            <strong>cargo:</strong>
                            {{ $customer->cargo }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
