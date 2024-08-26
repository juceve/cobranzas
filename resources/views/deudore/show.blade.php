@extends('adminlte::page')

@section('title', 'Información de Deudor')

@section('content_header')
<h4>Información de Deudor</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Datos de Deudor
                        </span>

                        <div class="float-right">
                            <a href="{{ route('deudores.index') }}" class="btn btn-info btn-sm float-right"
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
                                <strong>Codigocliente:</strong>
                                {{ $deudore->codigocliente }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Cliente:</strong>
                                {{ $deudore->cliente }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Doc. ID:</strong>
                                {{ $deudore->docid }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Tipo Doc.:</strong>
                                {{ $deudore->tipodoc_id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Fecha de nacimiento:</strong>
                                {{ $deudore->fechanacimiento }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Telf. Fijo:</strong>
                                {{ $deudore->telffijo }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Telf. Ccelular:</strong>
                                {{ $deudore->telfcelular }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Telf. Ref1:</strong>
                                {{ $deudore->telfref1 }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Telf. Ref2:</strong>
                                {{ $deudore->telfref2 }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Telf. Ref3:</strong>
                                {{ $deudore->telfref3 }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Nacionalidad:</strong>
                                {{ $deudore->nacionalidad }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Pais:</strong>
                                {{ $deudore->pais }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Ciudad:</strong>
                                {{ $deudore->ciudad }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Domicilio Coord X:</strong>
                                {{ $deudore->domcoorx }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Domicilio Coord Y:</strong>
                                {{ $deudore->domcoory }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Dirección Domicilio:</strong>
                                {{ $deudore->domdireccion }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Trabajo Coord X:</strong>
                                {{ $deudore->trabcoorx }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Trabajo Coord Y:</strong>
                                {{ $deudore->trabcoory }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Dirección Trabajo:</strong>
                                {{ $deudore->trabdireccion }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2 mb20">
                                <strong>Empresa:</strong>
                                {{ $deudore->empresa->nombre }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5>Deudas vinculadas</h5>
                    <table class="table table-bordered table-striped dataTable" style="font-size: 12px;">
                        <thead>
                            <tr class="table-info">
                                <th>Nro</th>
                                <th>NUM. DOC.</th>
                                <th>DIRECCIÓN</th>
                                <th>RANGO</th>
                                <th class="text-right">IMPORTE</th>
                                <th class="text-right">SALDO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($deudore->deudas as $item)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$item->numdoc}}</td>
                                <td>{{$item->direccion}}</td>
                                <td>{{$item->rango}}</td>
                                <td class="text-right">{{number_format($item->importe,2,'.')}}</td>
                                <td class="text-right">{{number_format($item->saldointerno,2,'.')}}</td>
                                <td class="text-right">
                                    <a href="{{route('deudas.show',$item->id)}}"
                                        class="btn btn-outline-warning btn-sm"><i class="fas fa-eye"></i> Ver Deuda</a>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
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