@extends('layouts.app')

@section('template_title')
    Deudores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Deudores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('deudores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Codigocliente</th>
									<th >Cliente</th>
									<th >Docid</th>
									<th >Tipodoc Id</th>
									<th >Fechanacimiento</th>
									<th >Telffijo</th>
									<th >Telfcelular</th>
									<th >Telfref1</th>
									<th >Telfref2</th>
									<th >Telfref3</th>
									<th >Nacionalidad</th>
									<th >Pais</th>
									<th >Ciudad</th>
									<th >Domcoorx</th>
									<th >Domcoory</th>
									<th >Domdireccion</th>
									<th >Trabcoorx</th>
									<th >Trabcoory</th>
									<th >Trabdireccion</th>
									<th >Empresa Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deudores as $deudore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $deudore->codigocliente }}</td>
										<td >{{ $deudore->cliente }}</td>
										<td >{{ $deudore->docid }}</td>
										<td >{{ $deudore->tipodoc_id }}</td>
										<td >{{ $deudore->fechanacimiento }}</td>
										<td >{{ $deudore->telffijo }}</td>
										<td >{{ $deudore->telfcelular }}</td>
										<td >{{ $deudore->telfref1 }}</td>
										<td >{{ $deudore->telfref2 }}</td>
										<td >{{ $deudore->telfref3 }}</td>
										<td >{{ $deudore->nacionalidad }}</td>
										<td >{{ $deudore->pais }}</td>
										<td >{{ $deudore->ciudad }}</td>
										<td >{{ $deudore->domcoorx }}</td>
										<td >{{ $deudore->domcoory }}</td>
										<td >{{ $deudore->domdireccion }}</td>
										<td >{{ $deudore->trabcoorx }}</td>
										<td >{{ $deudore->trabcoory }}</td>
										<td >{{ $deudore->trabdireccion }}</td>
										<td >{{ $deudore->empresa_id }}</td>

                                            <td>
                                                <form action="{{ route('deudores.destroy', $deudore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('deudores.show', $deudore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('deudores.edit', $deudore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $deudores->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
