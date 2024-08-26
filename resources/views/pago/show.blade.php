@extends('adminlte::page')

@section('title', 'Información del Pago')

@section('content_header')
<h4>Información del Pago</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Datos del Pago
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
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Fecha y Hora:</strong>
                                {{ $pago->fechahorapago }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Cobrador:</strong>
                                {{ $pago->user_id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Compromiso Pago Id:</strong>
                                {{ $pago->compromisopago_id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Observaciones:</strong>
                                {{ $pago->ncobrador }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Monto:</strong>
                                {{ $pago->monto }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Saldo antes Pago:</strong>
                                {{ $pago->saldoantespago }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Saldo despues Pago:</strong>
                                {{ $pago->saldodespuespago }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-group mb-2 mb20">
                                <strong>Metodo Pago:</strong>
                                {{ $pago->metodopago->nombre }}
                            </div>
                        </div>
                    </div>








                    <div class="form-group mb-2 mb20">
                        <strong>Comprobantes:</strong>
                        <div class="container mt-1">
                            <ul class="list-group">
                                @foreach ($comprobantes as $comprobante)
                                @php
                                $extension = pathinfo($comprobante, PATHINFO_EXTENSION);
                                $icon = 'fa-file'; // Icono genérico

                                switch (strtolower($extension)) {
                                case 'pdf':
                                $icon = 'fa-file-pdf';
                                break;
                                case 'jpg':
                                case 'jpeg':
                                case 'png':
                                case 'gif':
                                $icon = 'fa-file-image';
                                break;
                                case 'doc':
                                case 'docx':
                                $icon = 'fa-file-word';
                                break;
                                case 'xls':
                                case 'xlsx':
                                $icon = 'fa-file-excel';
                                break;
                                case 'zip':
                                case 'rar':
                                $icon = 'fa-file-archive';
                                break;
                                // Agrega más casos según sea necesario
                                }
                                @endphp
                                <li class="list-group-item text-primary">
                                    <i class="fas {{ $icon }} mr-2"></i>
                                    <a href="{{ asset($comprobante) }}" target="_blank" class="text-decoration-none">{{
                                        basename($comprobante) }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="row">
                        @forelse ($comprobantes as $item)
                        <div class="col-12 col-md-4 col-xl-3 mb-2">
                            <img src="{{asset($item)}}" class="img-fluid img-thumbnail">
                        </div>
                        @empty
                        <span>No se encontraron registros.</span>
                        @endforelse

                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection