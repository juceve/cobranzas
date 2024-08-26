@extends('adminlte::page')

@section('title', 'Información de Deuda')

@section('content_header')
<h4>Información de Deuda</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Datos de la Deuda
                        </span>

                        <div class="float-right">
                            <a href="javascript:history.back()" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Fecha:</strong>
                                {{ $deuda->fecha }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Num Doc:</strong>
                                {{ $deuda->numdoc }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Importe:</strong>
                                {{ number_format($deuda->importe ,2,'.')}}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Saldo:</strong>
                                {{ number_format($deuda->saldo,2,'.') }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Saldo Interno:</strong>
                                {{ number_format($deuda->saldointerno,2,'.') }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Vence:</strong>
                                {{ $deuda->vence }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Antigüedad:</strong>
                                {{ $deuda->antiguedad }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Anticuación:</strong>
                                {{ $deuda->anticuacion }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Rango:</strong>
                                {{ $deuda->rango }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Cliente:</strong>
                                {{ $deuda->cliente }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Ciudad Cliente:</strong>
                                {{ $deuda->clilugar }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Jefe Vendedor:</strong>
                                {{ $deuda->entnombrejefevendedor }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Supervisor:</strong>
                                {{ $deuda->entnombresupervisor }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Vendedor:</strong>
                                {{ $deuda->entnombrevendedor }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Plazo:</strong>
                                {{ $deuda->plazo }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Fecha Ultimo Pago:</strong>
                                {{ $deuda->fechaultimopago }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Ciudad:</strong>
                                {{ $deuda->ciunombre }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Zona:</strong>
                                {{ $deuda->zona_id?$deuda->zona->nombre:'Sin asignar' }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-none">
                            <div class="form-group mb-2 mb20">
                                <strong>Deudor:</strong>
                                {{ $deuda->deudore_id?$deuda->deudore->cliente:"NULL" }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Limite Credito:</strong>
                                {{ number_format($deuda->limitecredito,2,'.') }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>ID Ruta:</strong>
                                {{ $deuda->rutid }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Coordenada X:</strong>
                                {{ $deuda->coordenadax }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Coordenada Y:</strong>
                                {{ $deuda->coordenaday }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Telefono:</strong>
                                {{ $deuda->telefono }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Estado:</strong>
                                {{ $deuda->estado }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Dirección:</strong>
                                {{ $deuda->direccion }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Dirección Interna:</strong>
                                {{ $deuda->direccioninterna }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Control de Actualización:</strong>
                                @if ($deuda->ctrlupdate)
                                <span class="badge badge-pill badge-success">Con Cambios</span>
                                @else
                                <span class="badge badge-pill badge-secondary">Sin Cambios</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <span class="text-success">
                        <strong>
                            PAGOS APLICADOS A LA DEUDA
                        </strong>
                    </span>
                </div>
                <div class="card-body">
                    {{-- @dump($deuda->pagos) --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" style="font-size: 12px;">
                            <thead>
                                <tr class="table-success">
                                    <th>FECHA HORA PAGO</th>
                                    <th>SALDO ANTERIOR</th>
                                    <th>MONTO ABONADO</th>
                                    <th>SALDO</th>
                                    <th>METODO PAGO</th>
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($deuda->pagos as $item)
                                <tr>
                                    <td>{{$item->fechahorapago}}</td>
                                    <td>{{$item->saldoantespago}}</td>
                                    <td>{{$item->monto}}</td>
                                    <td>{{$item->saldodespuespago}}</td>
                                    <td>{{metodoPago($item->metodopago_id)}}</td>
                                    {{-- <td>{{$item->metodopago->nombrecorto}}</td> --}}
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center"><strong><i>No existen registros</i></strong>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-outline card-info">
                <div class="card-header text-info">
                    MOVIMIENTOS REGISTRADOS EN CARGA DE EXCEL
                </div>
                <div class="card-body">
                    @livewire('movimientos', ['deuda_id' => $deuda->id])
                </div>
            </div>
        </div>
    </div>

</section>
@endsection