@extends('layouts.app')

@section('template_title')
    Clientes
@endsection

@section('content')
    <div class="main" id="main">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clientes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('customer.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Cedula</th>
										<th>Fecha de Nacimiento</th>
                                        <th>Genero</th>
                                        <th>Estado Civil</th>
                                        <th>Profesion</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Telf. fijo</th>
                                        <th>Nacionalidad</th>
                                        {{-- <th>oficina</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
											<td>{{ $customer->name }}</td>
                                            <td>{{ $customer->subname }}</td>
											<td>{{ $customer->cedula }}</td>
                                            <td>{{ $customer->date_n}}</td>
{{--                                             <td>{{ $customer->img_cedula}}</td>
                                            <td>{{ $customer->img_partida_n}}</td> --}}
                                            <td>{{ $customer->sex}}</td>
                                            <td>{{ $customer->civil_status}}</td>
                                            <td>{{ $customer->profession_status}}</td>
                                            <td>{{ $customer->address}}</td>
                                            <td>{{ $customer->phone}}</td>
                                            <td>{{ $customer->landline}}</td>
                                            <td>{{ $customer->nationality}}</td>
                                            {{-- <td>{{ $customer->offices_id}}</td> --}} {{-- no necesario mostrar --}}
                                            <td></td>
                                            <td>
                                                <form action="{{ route('customer.destroy',$customer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('customer.show',$customer->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('customer.edit',$customer->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $customers->links() !!}
            </div>
        </div>
    </div>
@endsection
