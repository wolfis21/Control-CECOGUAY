@extends('layouts.app')

@section('template_title')
    Empleados
@endsection

@section('content')
    <div class="main" id="main">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
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
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Fecha de Nacimiento</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>oficina operada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
											<td>{{ $employee->cedula }}</td>
											<td>{{ $employee->name }}</td>
                                            <td>{{ $employee->subname }}</td>
                                            <td>{{ $employee->date_n}}</td>
                                            <td>{{ $employee->address}}</td>
                                            <td>{{ $employee->phone}}</td>
                                            {{-- <td>{{ $employee->office->address}}</td> --}}
                                            <td>{{$employee->offices_id}}</td>
                                            <td>
                                                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('employee.show',$employee->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('employee.edit',$employee->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@endsection
