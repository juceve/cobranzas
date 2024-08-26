@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
<h4>Pagos</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Pagos
                        </span>

                        <div class="float-right">
                            {{-- @can('empresas.create')
                            <a href="{{ route('pagos.create') }}" class="btn btn-primary btn-sm float-right"
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

                                    <th>Fecha-Hora</th>
                                    <th>Cobrador</th>
                                    <th>Monto</th>
                                    <th>Metodo Pago</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $pago->fechahorapago }}</td>
                                    <td>{{ $pago->user->name }}</td>
                                    <td>{{ $pago->monto }}</td>
                                    <td>{{ $pago->metodopago_id?$pago->metodopago->nombre:'NULL' }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-outline-primary "
                                                href="{{ route('pagos.show', $pago->id) }}" title="Ver info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            @can('pagos.edit')
                                            <button class="btn btn-sm btn-outline-success" {{--
                                                href="{{ route('pagos.edit', $pago->id) }}" --}} title="Editar"
                                                disabled><i class="fa fa-fw fa-edit"></i></button>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('pagos.delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Eliminar DB" disabled><i class="fa fa-fw fa-trash"></i></button>
                                            @endcan

                                        </form>
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