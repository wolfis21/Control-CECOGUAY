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

    </style>
</head>
<body>
    <div class="main" id="main" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" style="">
                                {{ __('Contrato Funerario') }}
                            </span>
                        </div>
                    </div>
                    {{-- Section contrato --}}
                    <div class="card-body">
                        <div class="form-group" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly; align-items: center;">
                            <div><strong style="width: 12rem;">Contrato No: </strong>{{ $contract->id }}</div>
                        </div>
                        <div class="form-group" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly; align-items: center;">
                            <strong style="    width: 15rem;">Fecha de Ingreso</strong>
                            <div class="form-control">{{ $contract->date_admission }}</div>
                        </div>
                        <div class="form-group" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly; align-items: center;">
                            <strong style="    width: 15rem;">Tipo de servicio</strong>
                            <div class="form-control">
                                @if ($contract->typeService)
                                    {{ $contract->typeService->name }}
                                @else
                                    No especificado
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- section cliente --}}
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Datos de Cliente') }}
                                </span>

                            </div>
                        </div>
                        <div class="card-custom-add">
                            <div class="card-body">
    
                                <div class="form-group">
                                    <strong>Cedula</strong>
                                    <div class="form-control">{{ $contract->customer->cedula }}</div>
    
                                </div>
                                <div class="form-group">
                                    <strong>Apellidos y Nombres</strong>
                                    <div class="form-control">{{ $contract->customer->name }} {{ $contract->customer->subname }}
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <strong>Fecha de nacimiento</strong>
                                    <div class="form-control">{{ $contract->customer->date_n }}</div>
    
                                </div>
    
                                <div class="form-group">
                                    <strong>Telefono</strong>
                                    <div class="form-control">{{ $contract->customer->phone }}</div>
    
                                </div>
    
                                <div class="form-group" style="    width: 31rem;">
                                    <strong>Direccion</strong>
                                    <div class="form-control">{{ $contract->customer->address }}</div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <div class="form-group" style="width: 45rem;">
                                    <strong>Observaciones</strong>
                                    <div class="form-control">{{ $contract->observaciones }}</div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: -60px; padding: 0;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    {{ __('Beneficiarios') }}
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
                                            <th>Fecha de Nacimiento</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Telefono</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($beneficiaries as $beneficiarie)
                                        <tr>
                                                <td>{{ $beneficiarie->id }}</td>
                                                <td>{{ $beneficiarie->name }} {{ $beneficiarie->subname }}</td>
                                                <td>{{ $beneficiarie->cedula }}</td>
                                                <td>{{ $beneficiarie->parentesco }}</td>
                                                <td>{{ $beneficiarie->date_n}}</td>
                                                <td>{{ $beneficiarie->date_admission}}</td>
                                                <td>{{ $beneficiarie->phone}}</td>

                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Costo semanal</strong>
                                <div class="form-control">{{ $contract->cost_semanal }}</div>
                            </div>
                            <div class="form-group">
                                <strong>Semana de Cobro</strong>
                                <div class="form-control">{{ $contract->semana_cobro }}</div>
                            </div>
                            <div class="form-group">
                                <strong>Suspendido</strong>
                                <div class="form-control">{{ $contract->suspendido }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

