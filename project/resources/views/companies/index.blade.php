@extends('layouts.app')

@section('template_title')
    empresa
@endsection

@section('content')
    <div class="main" id="main">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empresa') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                     
										<th>ID Empresa</th>
										<th>RIF Empresa</th>
										<th>Nombre</th>
										<th>Descripcion de la Empresa</th>
										<th>Numero Principal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companiess as $company)
                                        <tr>
                                           
											<td>{{ $company->id }}</td>
											<td>{{ $company->rif_companies }}</td>
											<td>{{ $company->name }}</td>
                                            <td>{{ $company->description }}</td>
                                            <td>{{ $company->num_contact}}</td>
                                            <td>
                                                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                                   {{--  <a class="btn btn-sm btn-primary " href="{{ route('empresa.show',$empresa->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('companies.edit',$company->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                   {{--  @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $companiess->links() !!}
            </div>
        </div>
    </div>
@endsection
`
