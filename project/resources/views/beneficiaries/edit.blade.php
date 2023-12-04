@extends('layouts.app')

@section('template_title')
    Actualizar Beneficiarios
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center"  style="padding: 100px">
            <div class="col-md-4">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Beneficiarios</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('beneficiaries.update', $beneficiaries->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('beneficiaries.form2')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
