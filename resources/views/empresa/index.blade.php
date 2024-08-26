@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
<h4>Empresas</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Empresas
                        </span>

                        <div class="float-right">
                            @can('empresas.create')
                            <a href="{{ route('empresas.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th class="text-center">Nro.</th>

                                    <th>Nombre</th>

                                    <th>CONTACTO</th>
                                    <th>CELULAR CTO.</th>
                                    <th class="text-center">ESTADO</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empresas as $empresa)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>

                                    <td>{{ $empresa->nombre }}</td>

                                    <td>{{ $empresa->personacontacto }}</td>
                                    <td>{{ $empresa->celularcontacto }}</td>
                                    <td class="text-center">
                                        @if ($empresa->status)
                                        <span class="badge badge-pill badge-success">Activo</span>
                                        @else
                                        <span class="badge badge-pill badge-secondary">Inactivo</span>
                                        @endif

                                    </td>

                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-list-ul"></i> Opciones
                                            </button>
                                            <div class="dropdown-menu">

                                                <a class=" dropdown-item text-secondary"
                                                    href="{{ route('empresas.show', $empresa->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Ver Info</a>
                                                @can('empresas.upddb')
                                                <a class="dropdown-item text-secondary"
                                                    href="{{ route('empresas.updatedb', $empresa->id) }}">
                                                    <i class="fas fa-database"></i> Actualiza DB</a>
                                                @endcan
                                                @can('empresas.edit')
                                                <a class="dropdown-item text-secondary"
                                                    href="{{ route('empresas.edit', $empresa->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Editar</a>
                                                @endcan
                                                <form action="{{ route('empresas.destroy', $empresa->id) }}"
                                                    method="POST" class="delete" onsubmit="return false">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('empresas.destroy')
                                                    <button type="submit" class="dropdown-item text-secondary"><i
                                                            class="fa fa-fw fa-trash"></i>Eliminar DB</button>
                                                    @endcan
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $empresas->withQueryString()->links() !!}
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