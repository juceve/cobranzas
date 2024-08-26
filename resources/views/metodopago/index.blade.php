@extends('adminlte::page')

@section('title', 'Metodos de Pago')

@section('content_header')
<h4>Metodos de Pago</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Metodos
                        </span>

                        <div class="float-right">
                            @can('metodopagos.create')
                            <a href="{{ route('metodopagos.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th>Nombre Corto</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metodopagos as $metodopago)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $metodopago->nombre }}</td>
                                    <td>{{ $metodopago->nombrecorto }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('metodopagos.destroy', $metodopago->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            {{-- <a class="btn btn-sm btn-primary "
                                                href="{{ route('metodopagos.show', $metodopago->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a> --}}
                                            @can('metodopagos.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('metodopagos.edit', $metodopago->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('metodopagos.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
            {!! $metodopagos->withQueryString()->links() !!}
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