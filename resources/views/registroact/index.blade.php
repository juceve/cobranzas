@extends('layouts.app')

@section('template_title')
    Registroacts
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registroacts') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registroacts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Url</th>
									<th >Fecha</th>
									<th >Hora</th>
									<th >Empresa Id</th>
									<th >User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registroacts as $registroact)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $registroact->url }}</td>
										<td >{{ $registroact->fecha }}</td>
										<td >{{ $registroact->hora }}</td>
										<td >{{ $registroact->empresa_id }}</td>
										<td >{{ $registroact->user_id }}</td>

                                            <td>
                                                <form action="{{ route('registroacts.destroy', $registroact->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registroacts.show', $registroact->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registroacts.edit', $registroact->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $registroacts->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
