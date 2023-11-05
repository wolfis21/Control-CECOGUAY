@extends('layouts.app')

@section('template_title')
    {{ $empresa->name_empre ?? 'Show empresa' }}
    {{ $zona->direccion_z ?? 'Show empresa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show zona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('zona.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                    {{-- //arreglar esto aca --}}
                        <div class="form-group">
                            <strong>id zona:</strong>
                            {{ $zona->id }}
                        </div>
                        <div class="form-group">
                            <strong>direccion_z:</strong>
                            {{ $zona->direccion_z }}
                        </div>
                        
                        <div class="form-group">
                            <strong>number_cont:</strong>
                            {{ $zona->number_cont }}
                        </div>
                        
                        <div class="form-group">
                            <strong>empresa relacionada:</strong>
                            {{ $zona->empresa_id }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
