@extends('layouts.app')

@section('template_title')
    Actualizacion de Oficina
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center"  style="padding: 100px">
            <div class="col-md-4">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizacion de Oficina</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('offices.update', $office->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('office.form2')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
