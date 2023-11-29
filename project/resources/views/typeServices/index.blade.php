@extends('layouts.appAdmin')

@section('template_title')
    Tipos de Servicios
@endsection

@section('content')
    <div class="main" id="main">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <form class="d-flex" role="search" style="    width: 83rem;">
                <input class="form-control me-2" type="search" placeholder="Escribe..." aria-label="Search">
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
                                {{ __('Servicios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('typeService.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
										<th>Precio $</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typeServices as $typeService)
                                        <tr>
											<td>{{ $typeService->name }}</td>
                                            <td>{{ $typeService->price }}</td>
                                            <td>
                                                <form action="{{ route('typeService.destroy',$typeService->id) }}" method="POST">
                                                   {{--  <a class="btn btn-sm btn-primary " href="{{ route('typeService.show',$typeService->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('typeService.edit',$typeService->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $typeServices->links() !!}
            </div>
        </div>
    </div>
    <style>
        .main thead{
            font-size: 13px!important;
        }
        
        .main tbody{
            font-size: 14px!important;
        }

    </style>
@endsection
`
