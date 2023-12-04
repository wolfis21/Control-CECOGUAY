@extends('layouts.app')

@section('template_title')
    {{ $customer->name ?? 'Datos Cliente:' }}
@endsection

@section('content')
    <div class="main" id="main" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contrato Funerario') }}
                            </span>

                        </div>
                    </div>
                    {{-- Section contrato --}}
                    <div class="card-body">
                        <div class="form-group" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly; align-items: center;">
                            <strong style="    width: 12rem;">Contrato No</strong>
                            <div class="form-control">{{ $contract->id }}</div>
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

                    {{-- section 2 --}}



                </div>
            </div>
        </div>
        <div style="  margin-top: -60px; padding: 0;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Beneficiarios') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('beneficiaries.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                      {{ __('Agregar beneficiario') }}
                                    </a>
                                </div>

{{--                                 <div class="float-right">
                                    <a href="{{ route('beneficiaries.createWithContract', ['contract' => $contract->id]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Crear nuevo') }}
                                    </a>
                                </div> --}}
                                
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

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
                                            {{-- <td>{{ $beneficiarie->typeService->name}}</td> --}}

{{--                                             <td>001</td>
                                            <td>Lopez Maria</td>
                                            <td>1234567</td>
                                            <td>Madre</td>
                                            <td>04/08/1980</td>
                                            <td>{{ $contract->customer->name }} {{ $contract->customer->subname }}</td>
 --}}
                                            <td>
                                                <form action="{{ route('beneficiaries.destroy', $beneficiarie->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('beneficiaries.edit', $beneficiarie->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
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
                    {{-- {!! $contracts->links() !!} --}}
                </div>
            </div>
            {{-- </section> --}}
        </div>

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
/*             .form-group{
                display: flex;
                flex-wrap: nowrap;
                align-items: center;
                align-content: stretch;
                flex-direction: row;
            } */

            .card-body {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                justify-content: space-evenly;
            }
        </style>
    @endsection
