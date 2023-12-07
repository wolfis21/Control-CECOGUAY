@extends('layouts.app')

@section('template_title')
    Contratos
@endsection

@section('content')
    <div class="main" id="main">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search" style="width: 83rem;" action="{{ route('contracts.search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Escriba numero de contrato..." aria-label="Search" name="query">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
          </nav>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contratos') }}
                            </span>
                            

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
										<th>Responsable</th>
										<th>Cedula R.</th>
										<th>Fecha de ingreso</th>
                                        {{-- <th>Tipo de Servicio</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $contract)
                                        <tr>
											<td>{{ $contract->id }}</td>
											<td>{{ $contract->customer->name }} {{ $contract->customer->subname }}</td>
                                            <td>{{ $contract->customer->cedula }}</td>
                                            <td>{{ $contract->date_admission}}</td>
                                            <td>{{ $contract->address}}</td>
                                            {{-- <td>{{ $contract->typeService->name}}</td> --}}
                                            <td>
                                                <form action="{{ route('contracts.destroy',$contract->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('contracts.show',$contract->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('contracts.edit',$contract->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                </div>
                {!! $contracts->links() !!}
            </div>
        </div>
    </div>
@endsection
