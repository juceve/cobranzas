@extends('layouts.app')

@section('template_title')
    Lotedeudas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lotedeudas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lotedeudas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Lote Id</th>
									<th >Deuda Id</th>
									<th >Fechahoracobro</th>
									<th >Finalizado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lotedeudas as $lotedeuda)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $lotedeuda->lote_id }}</td>
										<td >{{ $lotedeuda->deuda_id }}</td>
										<td >{{ $lotedeuda->fechahoracobro }}</td>
										<td >{{ $lotedeuda->finalizado }}</td>

                                            <td>
                                                <form action="{{ route('lotedeudas.destroy', $lotedeuda->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('lotedeudas.show', $lotedeuda->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('lotedeudas.edit', $lotedeuda->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $lotedeudas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
