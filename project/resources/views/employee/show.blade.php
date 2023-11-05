@extends('layouts.app')

@section('template_title')
    {{ $empleado->pname ?? 'Show empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleado.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                    {{-- //arreglar esto aca --}}
                        <div class="form-group">
                            <strong>cedula:</strong>
                            {{ $empleado->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>pname:</strong>
                            {{ $empleado->pname }}
                        </div>
                        
                        <div class="form-group">
                            <strong>psubname:</strong>
                            {{ $empleado->psubname }}
                        </div>
                        <div class="form-group">
                            <strong>fecha_n:</strong>
                            {{ $empleado->fecha_n }}
                        </div>

                        <div class="form-group">
                            <strong>direccion:</strong>
                            {{ $empleado->direccion }}
                        </div>
                        
                        <div class="form-group">
                            <strong>telefono:</strong>
                            {{ $empleado->telefono }}
                        </div>
                        
                        <div class="form-group">
                            <strong>cargo:</strong>
                            {{ $empleado->cargo }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
