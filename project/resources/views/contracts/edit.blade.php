@extends('layouts.app')

@section('template_title')
    Modificar Contrato funerario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center"  style="padding: 100px">
            <div class="col-md-4">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Contrato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contracts.update', $contract->id) }}"  role="form" enctype="multipart/form-data">
                            {{-- {{ method_field('PATCH') }} --}}
                            @csrf

                            @include('contracts.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
