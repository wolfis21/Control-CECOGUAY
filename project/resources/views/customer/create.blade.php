@extends('layouts.app')

@section('template_title')
    Crear Cliente 
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center"  style="padding: 100px">
            <div class="col-md-4">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Cliente </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('customer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
