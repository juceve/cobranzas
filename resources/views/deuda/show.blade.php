@extends('layouts.app')

@section('template_title')
    {{ $deuda->name ?? __('Show') . " " . __('Deuda') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Deuda</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('deudas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $deuda->fecha }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numdoc:</strong>
                                    {{ $deuda->numdoc }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Importe:</strong>
                                    {{ $deuda->importe }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Saldo:</strong>
                                    {{ $deuda->saldo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Vence:</strong>
                                    {{ $deuda->vence }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Antiguedad:</strong>
                                    {{ $deuda->antiguedad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Anticuacion:</strong>
                                    {{ $deuda->anticuacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rango:</strong>
                                    {{ $deuda->rango }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cliente:</strong>
                                    {{ $deuda->cliente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clilugar:</strong>
                                    {{ $deuda->clilugar }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Entnombrejefevendedor:</strong>
                                    {{ $deuda->entnombrejefevendedor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Entnombresupervisor:</strong>
                                    {{ $deuda->entnombresupervisor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Entnombrevendedor:</strong>
                                    {{ $deuda->entnombrevendedor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Plazo:</strong>
                                    {{ $deuda->plazo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechaultimopago:</strong>
                                    {{ $deuda->fechaultimopago }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ciunombre:</strong>
                                    {{ $deuda->ciunombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Deudore Id:</strong>
                                    {{ $deuda->deudore_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Limitecredito:</strong>
                                    {{ $deuda->limitecredito }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rutid:</strong>
                                    {{ $deuda->rutid }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Coordenadax:</strong>
                                    {{ $deuda->coordenadax }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Coordenaday:</strong>
                                    {{ $deuda->coordenaday }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $deuda->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $deuda->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $deuda->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ctrlupdate:</strong>
                                    {{ $deuda->ctrlupdate }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
