<div>
    @section('title', 'Informes')

    @section('content_header')
        <div class="container-fluid">
            <h4>Informes</h4>
        </div>

    @endsection

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary">
                Listado de Informes

                <div class="float-right">
                    {{-- @can('empresas.create') --}}
                    <a href="{{ route('nuevoinforme') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                        <i class="fas fa-plus"></i> Nuevo
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-1 col-12 col-sm-3 col-xl-4">
                        <label>Empresa:</label>
                        <select wire:model='empresa_id' class="form-control form-control-sm">
                            <option value=""><strong>-- Seleccione una Empresa --</strong></option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm dataTable" style="font-size: 13px;">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>DIRIGIDA A</th>
                                <th>FECHA REGISTRO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($empresa)
                                @foreach ($empresa->citeinformes as $item)
                                <tr class="text-center">
                                    <td class="align-middle">{{$item->id}}</td>
                                    <td class="align-middle">{{$item->fecha}}</td>
                                    <td class="align-middle text-left">{{$item->receptor}}</td>
                                    <td class="align-middle">{{$item->created_at}}</td>
                                    <td class="align-middle text-right">
                                        <button class="btn btn-outline-success btn-sm">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center"><strong><i>No existen resultados.</i></strong></td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@section('plugins.Datatables', true)
@section('js')
    <script>
        $('.dataTable').DataTable({
            destroy: true,
            columnDefs: [{
                    "type": "num",
                    "targets": 0
                } // Aplica el tipo numérico a la primera columna
            ],
            language: {
                url: '{{ asset('vendor/datatable/es-MX.json') }}',
            },
        });
    </script>
@endsection
