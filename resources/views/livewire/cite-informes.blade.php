<div>
    @section('title', 'Informe de Avance')

    @section('content_header')
        <div class="container-fluid">
            <h4>Informe de Avance</h4>
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
                            <option value="">-- Seleccione una Empresa --</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <hr>
                <div class="table-responsive" wire:ignore.self>
                    @if ($empresa_id)
                      <table class="table table-bordered table-striped table-sm dataTable" style="font-size: 13px;">
                        <thead>
                            <tr class="text-center table-primary">
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>DIRIGIDA A</th>
                                <th>FECHA REGISTRO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($empresa_id)
                                @foreach ($empresa->citeinformes as $item)
                                    <tr class="text-center">
                                        <td class="align-middle">{{ $item->id }}</td>
                                        <td class="align-middle">{{ $item->fecha }}</td>
                                        <td class="align-middle text-left">{{ $item->receptor }}</td>
                                        <td class="align-middle">{{ $item->created_at }}</td>
                                        <td class="align-middle text-right">
                                            <a href="{{ route('pdf.informe', $item->id) }}"
                                                class="btn btn-outline-info btn-sm" target="_blank" title="Genera Informe">
                                                <i class="fas fa-file"></i>
                                            </a>
                                            <a href="{{ route('chartciteinforme', $item->id) }}"
                                                class="btn btn-outline-success btn-sm" target="_blank" title="Genera Gráfico">
                                                <i class="fas fa-chart-pie"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center"><strong><i>No existen
                                                resultados.</i></strong></td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                    @endif

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
            order: [
                [0, "desc"]
            ],
            language: {
                url: '{{ asset('vendor/datatable/es-MX.json') }}',
            },
        });
    </script>
    <script>
        Livewire.on('datatable', () => {
            $('.dataTable').DataTable({
                destroy: true,
                columnDefs: [{
                        "type": "num",
                        "targets": 0
                    } // Aplica el tipo numérico a la primera columna
                ],
                order: [
                    [0, "desc"]
                ],
                language: {
                    url: '{{ asset('vendor/datatable/es-MX.json') }}',
                },
            });
        });
    </script>
@endsection
