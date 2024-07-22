@extends('layouts.app')

@section('template_title')
    Deudas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Deudas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('deudas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Fecha</th>
									<th >Numdoc</th>
									<th >Importe</th>
									<th >Saldo</th>
									<th >Vence</th>
									<th >Antiguedad</th>
									<th >Anticuacion</th>
									<th >Rango</th>
									<th >Cliente</th>
									<th >Clilugar</th>
									<th >Entnombrejefevendedor</th>
									<th >Entnombresupervisor</th>
									<th >Entnombrevendedor</th>
									<th >Plazo</th>
									<th >Fechaultimopago</th>
									<th >Ciunombre</th>
									<th >Deudore Id</th>
									<th >Limitecredito</th>
									<th >Rutid</th>
									<th >Coordenadax</th>
									<th >Coordenaday</th>
									<th >Telefono</th>
									<th >Estado</th>
									<th >Direccion</th>
									<th >Ctrlupdate</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deudas as $deuda)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $deuda->fecha }}</td>
										<td >{{ $deuda->numdoc }}</td>
										<td >{{ $deuda->importe }}</td>
										<td >{{ $deuda->saldo }}</td>
										<td >{{ $deuda->vence }}</td>
										<td >{{ $deuda->antiguedad }}</td>
										<td >{{ $deuda->anticuacion }}</td>
										<td >{{ $deuda->rango }}</td>
										<td >{{ $deuda->cliente }}</td>
										<td >{{ $deuda->clilugar }}</td>
										<td >{{ $deuda->entnombrejefevendedor }}</td>
										<td >{{ $deuda->entnombresupervisor }}</td>
										<td >{{ $deuda->entnombrevendedor }}</td>
										<td >{{ $deuda->plazo }}</td>
										<td >{{ $deuda->fechaultimopago }}</td>
										<td >{{ $deuda->ciunombre }}</td>
										<td >{{ $deuda->deudore_id }}</td>
										<td >{{ $deuda->limitecredito }}</td>
										<td >{{ $deuda->rutid }}</td>
										<td >{{ $deuda->coordenadax }}</td>
										<td >{{ $deuda->coordenaday }}</td>
										<td >{{ $deuda->telefono }}</td>
										<td >{{ $deuda->estado }}</td>
										<td >{{ $deuda->direccion }}</td>
										<td >{{ $deuda->ctrlupdate }}</td>

                                            <td>
                                                <form action="{{ route('deudas.destroy', $deuda->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('deudas.show', $deuda->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('deudas.edit', $deuda->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $deudas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
