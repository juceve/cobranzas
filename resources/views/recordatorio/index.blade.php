@extends('adminlte::page')

@section('title', 'Recordatorios')

@section('content_header')
<h4>Recordatorios</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Recordatorios
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
                                    <th>Fecha</th>
                                    <th>Titulo</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recordatorios as $recordatorio)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $recordatorio->fecha }}</td>
                                    <td>{{ $recordatorio->titulo }}</td>
                                    <td>
                                        @if ( $recordatorio->atendido==0)
                                        <span class="badge badge-pill badge-warning">Pendiente</span>
                                        @else
                                        <span class="badge badge-pill badge-success">Revisado</span>
                                        @endif
                                    </td>

                                    <td class="text-right">
                                        <a class="btn btn-sm btn-outline-{{!$recordatorio->atendido?'warning':'success'}}"
                                            href="{{ route('recordatorios.edit', $recordatorio->id) }}"><i
                                                class="fa fa-fw fa-search"></i> Revisar</a>

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