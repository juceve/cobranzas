@extends('adminlte::page')

@section('title', 'Estados de Contacto')

@section('content_header')
<h4>Estados de Contacto</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Estados
                        </span>

                        <div class="float-right">
                            @can('estadocontactos.create')
                            <a href="{{ route('estadocontactos.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estadocontactos as $estadocontacto)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $estadocontacto->nombre }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('estadocontactos.destroy', $estadocontacto->id) }}"
                                            method="POST" class="delete" onsubmit="return false">
                                            @can('estadocontactos.edit')
                                            <a class="btn btn-sm btn-outline-success"
                                                href="{{ route('estadocontactos.edit', $estadocontacto->id) }}"><i
                                                    class="fa fa-fw fa-edit" title="Editar"></i> </a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('estadocontactos.destroy')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Eliminar">
                                                <i class="fa fa-fw fa-trash"></i> </button>
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