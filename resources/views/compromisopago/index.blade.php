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
                        <table class="table table-striped table-hover dataTable" style="font-size: 12px;">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>FECHA - HORA</th>
                                    <th>MONTO</th>
                                    <th>CLIENTE</th>
                                    <th>DIRECCIÓN</th>
                                    <th>ESTADO</th>
                                    <th style="max-width: 60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compromisopagos as $compromisopago)
                                <tr>
                                    <td class="align-middle">{{ ++$i }}</td>

                                    <td class="align-middle">{{ $compromisopago->fechahoracompromiso }}</td>
                                    <td class="align-middle">{{ $compromisopago->montocomprometido }}</td>
                                    <td class="align-middle">{{ $compromisopago->contacto->lotedeuda->deuda->cliente }}
                                    </td>
                                    <td class="align-middle">{{ $compromisopago->contacto->lotedeuda->deuda->direccion
                                        }}</td>
                                    <td class="align-middle">
                                        @if (!$compromisopago->contactado)
                                        <span class="badge badge-pill badge-warning">Pendiente</span>
                                        @else
                                        <span class="badge badge-pill badge-success">Procesado</span>
                                        @endif
                                    </td>
                                    <td class="text-right align-middle">
                                        @if (!$compromisopago->contactado)
                                        <form action="{{ route('compromisopagos.destroy', $compromisopago->id) }}"
                                            class="delete" onsubmit="return false" method="POST">

                                            @can('compromisopagos.edit')
                                            <a class="btn btn-sm btn-outline-warning"
                                                href="{{ route('compromisopagos.edit', $compromisopago->id) }}"
                                                title="Procesar"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('compromisopagos.destroy')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Eliminar">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </button>
                                            @endcan
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    $('.dataTable').DataTable({
        destroy:true,
        language: {
        url: '{{asset("vendor/datatable/es-MX.json")}}',
    },
    });
</script>
@endsection