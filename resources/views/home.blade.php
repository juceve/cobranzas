@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <h1>Tablero de Control</h1>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h5 class="text-lightblue">Bienvenido al Módulo de Cobranzas - Black Bird</h5>
        </div>
        <div class="col-4">
            <div class="float-right">
                @livewire('server-time')
            </div>

        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$rpt1->cantdeudas}}</h3>

                    <p>Deudas en Lote</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>

            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$rpt1->cantpagos}}</h3>

                    <p>Pagos Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cash-register"></i>
                </div>

            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$rpt1->cantrecordatorios}}</h3>

                    <p>Recordatorios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>

            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$rpt1->cantcompromisos}}</h3>

                    <p>Compromisos de Pago</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comment-dollar"></i>
                </div>

            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-12 col-md-6">
            <div class="card card-outline card-lightblue">
                <div class="card-header border-0">
                    <h3 class="card-title text-lightblue"><strong>ANTICUACIONES</strong></h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-info">
                            <tr>
                                <th>ANTIICUACION</th>
                                <th class="text-center">CANTIDAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anticuaciones as $item)
                            <tr>
                                <td>
                                    {{$item->anticuacion}}
                                </td>
                                <td class="text-center">
                                    {{$item->cantidad}}
                                </td>
                            </tr>
                </div>
                @endforeach
                </tbody>
                </table>



            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">

    </div>
</div>
</div>


@endsection

@section('js')

@endsection