@extends('layouts.app')

@section('template_title')
    Resultadocontactos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Resultadocontactos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('resultadocontactos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Resultado Id</th>
									<th >Contacto Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resultadocontactos as $resultadocontacto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $resultadocontacto->resultado_id }}</td>
										<td >{{ $resultadocontacto->contacto_id }}</td>

                                            <td>
                                                <form action="{{ route('resultadocontactos.destroy', $resultadocontacto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('resultadocontactos.show', $resultadocontacto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('resultadocontactos.edit', $resultadocontacto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $resultadocontactos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
