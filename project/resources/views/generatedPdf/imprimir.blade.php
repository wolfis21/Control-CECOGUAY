<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>REPORTE</title>
    <style>
        .float-right {
            float: inline-end;
        }

        .float-right a {
            font-size: 14px;
        }

        .form-control {
            font-size: 14px !important;
        }

        .card-body {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-evenly;
            padding: 0 20px 20px 20px;
        }
        .card-header, .card-footer {
            border-color: #ebeef4;
            background-color: #fff;
            color: #798eb3;
            padding: 15px;
        }
        .card-header{
            border-bottom: 2px solid black;
            padding-bottom: 15px;
        }
        .card {
            --bs-card-spacer-y: 1rem;
            --bs-card-spacer-x: 1rem;
            --bs-card-title-spacer-y: 0.5rem;
            --bs-card-border-width: 1px;
            --bs-card-border-color: var(--bs-border-color-translucent);
            --bs-card-border-radius: 0.375rem;
            --bs-card-box-shadow: ;
            --bs-card-inner-border-radius: calc(0.375rem - 1px);
            --bs-card-cap-padding-y: 0.5rem;
            --bs-card-cap-padding-x: 1rem;
            --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
            --bs-card-cap-color: ;
            --bs-card-height: ;
            --bs-card-color: ;
            --bs-card-bg: #fff;
            --bs-card-img-overlay-padding: 1rem;
            --bs-card-group-margin: 0.75rem;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: var(--bs-card-height);
            word-wrap: break-word;
            background-color: var(--bs-card-bg);
            background-clip: border-box;
            border: var(--bs-card-border-width) solid var(--bs-card-border-color);
            border-radius: var(--bs-card-border-radius);
        }
        #card_title{
            font-size: 20px;
            font-weight: bold;
            color: black
        }
        th,td {
            padding-left: 24px;
        }
        .thead{
            border-bottom: 1px solid black;
            
        }
        th{
            padding-bottom: 10px;
        }
        .img-custom{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .img-adj{
            padding-top: 5rem;
        }

    </style>
</head>
<body>
    <div class="main" id="main" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title" style="padding-left:150px;">
                        {{ __('Al FONDO DE PROTECCION FAMILIAR') }}
                    </span>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" style="padding-top:20px;">
                                {{ __('CONTRATO FUNERARIO') }}
                            </span>
                        </div>
                    </div>
                    {{-- Section contrato --}}
                    <div class="card-body">
                        <div class="form-group" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly; align-items: center;">
                            <div><strong style="width: 12rem;">Acuerdo No: </strong>{{ $contract->id }} 
                                <strong style=" width: 15rem; padding-left:50px;">Fecha de Incorporacion: </strong>{{ $contract->date_admission }}
                                <strong style=" width: 15rem; padding-left:60px;">Tipo de servicio: </strong>
                                @if ($contract->typeService)
                                    {{ $contract->typeService->name }}
                                @else
                                    No especificado
                                @endif</div> 
                        </div>
                    </div>
{{--                     <div class="card-body">
                        <div class="form-group">
                            <div><strong>Costo semanal: </strong>{{ $contract->cost_semanal }}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Semana de Cobro: </strong>{{ $contract->semana_cobro }}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Suspendido: </strong>{{ $contract->suspendido }}</div>
                        </div>
                    </div> --}}
                    {{-- section cliente --}}
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('DATOS DEL APORTANTE') }}
                                </span>

                            </div>
                        </div>
                        <div class="card-custom-add">
                            <div class="card-body">
    
                                <div class="form-group" style="padding-bottom: 5px;">
                                    <div><strong>Cedula: </strong>{{ $contract->customer->cedula }}
                                        <strong style=" width: 15rem; padding-left:50px;">Apellidos y Nombres: </strong>{{ $contract->customer->name }} {{ $contract->customer->subname }}</div>
                                </div>
                                <div class="form-group" style="padding-bottom: 5px;">
                                    <div><strong>Fecha de nacimiento: </strong>{{ $contract->customer->date_n }}
                                        <strong style=" width: 15rem; padding-left:50px;">Direccion: </strong>{{ $contract->customer->address }}</div>
                                </div>
                                <div class="form-group" style="padding-bottom: 5px;">
                                    <div><strong>Observaciones: </strong>{{ $contract->observaciones }}</div>
                                </div>                                
                                <div class="form-group" style="padding-bottom: 5px;">
                                    <div><strong>Telefono: </strong>{{ $contract->customer->phone }}</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    {{ __('BENEFICIARIOS CON DERECHO AL SERVICIO') }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>N#</th>
                                            <th>Apellidos y Nombres</th>
                                            <th>Cedula</th>
                                            <th>Parentesco</th>
                                            <th>Fecha de Ing.</th>
                                            <th>Fecha de Nac.</th>
                                            {{-- <th>Telefono</th>  --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($beneficiaries as $beneficiarie)
                                        <tr>
                                                <td>{{ $beneficiarie->id }}</td>
                                                <td>{{ $beneficiarie->subname }} {{ $beneficiarie->name }}</td>
                                                <td>{{ $beneficiarie->cedula }}</td>
                                                <td>{{ $beneficiarie->parentesco }}</td>
                                                <td>{{ $beneficiarie->date_admission}}</td>
                                                <td>{{ $beneficiarie->date_n}}</td>
                                                {{-- <td>{{ $beneficiarie->phone}}</td> --}} {{-- EDAD? --}}

                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
{{--                         <div class="card-body">
                            <div class="form-group">
                                <div><strong>Costo semanal: </strong>{{ $contract->cost_semanal }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Semana de Cobro: </strong>{{ $contract->semana_cobro }}</div>
                            </div>
                            <div class="form-group">
                                <div><strong>Suspendido: </strong>{{ $contract->suspendido }}</div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img-adj">
        <!-- Mostrar la imagen de la cédula del cliente -->
        <div class="img-custom">
            Cedula Cliente:
            <img src="data:image;base64, {{ $imgCedulaBase64 }}" alt="Cédula">
        </div>

        <!-- Mostrar la imagen de la partida de nacimiento del cliente -->
        <div class="img-custom">
            Partida de Nacimiento cliente:
            <img src="data:image;base64, {{ $imgPartNBase64 }}" alt="Partida de nacimiento">
        </div>

        <!-- Mostrar las imágenes de la cédula y partida de nacimiento de los beneficiarios -->
        <div class="img-custom">
            Documentos de Beneficiarios:
            @foreach ($beneficiaries as $beneficiarie)
                <img src="data:image;base64, {{ $beneficiarie->img_cedula_base64 }}" alt="Cédula de Beneficiario">
                <img src="data:image;base64, {{ $beneficiarie->img_partida_base64 }}" alt="Partida de nacimiento de Beneficiario">
            @endforeach
        </div>
    </div>

</body>
</html>

