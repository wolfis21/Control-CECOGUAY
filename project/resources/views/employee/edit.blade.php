@extends('layouts.appAdmin')

@section('template_title')
    Actualizar Empleado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center"  style="padding: 100px">
            <div class="col-md-4">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Empleado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employee.update', $employee->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('employee.form2')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
