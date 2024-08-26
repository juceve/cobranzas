@extends('adminlte::page')

@section('title', 'Tipo Resultados')

@section('content_header')
<h4>Tipo Resultados</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Resultados
                        </span>

                        <div class="float-right">
                            {{-- @can('empresas.create') --}}
                            <a href="{{ route('resultados.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            {{-- @endcan --}}
                        </div>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resultados as $resultado)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $resultado->nombre }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('resultados.destroy', $resultado->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            {{-- <a class="btn btn-sm btn-primary "
                                                href="{{ route('resultados.show', $resultado->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> </a> --}}
                                            <a class="btn btn-sm btn-outline-success"
                                                href="{{ route('resultados.edit', $resultado->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Eliminar">
                                                <i class="fa fa-fw fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $resultados->withQueryString()->links() !!}
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