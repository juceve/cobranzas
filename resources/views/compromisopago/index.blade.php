@extends('adminlte::page')

@section('title', 'Compromisos de Pago')

@section('content_header')
<h4>Compromisos de Pago</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Compromisos
                        </span>

                        <div class="float-right">
                            {{-- @can('empresas.create')
                            <a href="{{ route('compromisopagos.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            @endcan --}}
                        </div>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>FECHA - HORA</th>
                                    <th>MONTO</th>
                                    <th>CLIENTE</th>
                                    <th>DIRECCIÓN</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compromisopagos as $compromisopago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $compromisopago->fechahoracompromiso }}</td>
                                    <td>{{ $compromisopago->montocomprometido }}</td>
                                    <td>{{ $compromisopago->lotedeuda->deuda->cliente }}</td>
                                    <td>{{ $compromisopago->lotedeuda->deuda->direccion }}</td>

                                    <td>
                                        <form action="{{ route('compromisopagos.destroy', $compromisopago->id) }}"
                                            class="delete" onsubmit="return false" method="POST">

                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('compromisopagos.edit', $compromisopago->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> Atender</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-fw fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $compromisopagos->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection