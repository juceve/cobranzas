@extends('layouts.app')

@section('template_title')
    Contactos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contactos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Lotedeuda Id</th>
									<th >Estadocontacto Id</th>
									<th >Gestiontipo Id</th>
									<th >Fechacontacto</th>
									<th >Horacontacto</th>
									<th >Nombrecontacto</th>
									<th >Proxcontacto</th>
									<th >Detalles</th>
									<th >Resultado</th>
									<th >Solicitudempresa</th>
									<th >Accionpropia</th>
									<th >Urlfoto</th>
									<th >Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contactos as $contacto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $contacto->lotedeuda_id }}</td>
										<td >{{ $contacto->estadocontacto_id }}</td>
										<td >{{ $contacto->gestiontipo_id }}</td>
										<td >{{ $contacto->fechacontacto }}</td>
										<td >{{ $contacto->horacontacto }}</td>
										<td >{{ $contacto->nombrecontacto }}</td>
										<td >{{ $contacto->proxcontacto }}</td>
										<td >{{ $contacto->detalles }}</td>
										<td >{{ $contacto->resultado }}</td>
										<td >{{ $contacto->solicitudempresa }}</td>
										<td >{{ $contacto->accionpropia }}</td>
										<td >{{ $contacto->urlfoto }}</td>
										<td >{{ $contacto->status }}</td>

                                            <td>
                                                <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('contactos.show', $contacto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('contactos.edit', $contacto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $contactos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
