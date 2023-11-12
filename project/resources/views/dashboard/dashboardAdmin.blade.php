@extends('layouts.appAdmin')

@section('content')
<div class="main" id="main">
    <div class="pagetitle">
        <h1>Bienvenido</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Inicio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="section-dash">
            <i class="bi bi-gear-wide-connected" style="    font-size: 15rem"></i>
            <span>Nombre de usuario de ADMINISTRADOR</span>
        </div>
      </div>
    </section>

    <style type="text/css">
        .section-dash{
            display: flex;
            flex-wrap: nowrap;
            flex-direction: column-reverse;
            align-items: center;
        }
    </style>
@endsection
