@extends('layouts.app')

@section('template_title')
    {{ $empresa->name_empre ?? 'Show empresa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show empresa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresa.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                    {{-- //arreglar esto aca --}}
                        <div class="form-group">
                            <strong>id empresa:</strong>
                            {{ $empresa->id }}
                        </div>
                        <div class="form-group">
                            <strong>rif_empresa:</strong>
                            {{ $empresa->rif_empresa }}
                        </div>
                        
                        <div class="form-group">
                            <strong>name_empresa:</strong>
                            {{ $empresa->name_empre }}
                        </div>
                        <div class="form-group">
                            <strong>descrip_empresa:</strong>
                            {{ $empresa->descript_empre }}
                        </div>

                        <div class="form-group">
                            <strong>numero de contacto:</strong>
                            {{ $empresa->num_p }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
