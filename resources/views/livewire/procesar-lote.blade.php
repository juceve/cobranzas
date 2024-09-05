<div>
    @section('title', 'Procesamiento de Lote')

    @section('content_header')
        <h4>Procesamiento de Lote</h4>

    @endsection

    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-header">
                {{-- Detalles del Lote

                <div class="float-right">
                    <a href="{{ route('mislotes') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div> --}}
                <span class="card-title text-secondary"><strong>Detalles del Lote</strong></span>

                <div class="card-tools">
                    <a href="{{ route('mislotes', $lote->empresa_id) }}" type="button" class="btn btn-tool" title="Volver">
                        <i class="fas fa-arrow-alt-circle-left"></i> Volver
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Min/Max">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body">
                <div class="row" style="font-size: 12px;">
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label>CODIGO: </label>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $lote->codigo }}">
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label>FECHA: </label>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $lote->fecha }}">
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label>EMPRESA: </label>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $lote->empresa_id ? $lote->empresa->nombre : ' NULL' }}">
                        </div>
                    </div>
                    <div class="col-12 col-xl-12">
                        <div class="form-group">
                            <label for="">Avance:</label>
                            @if ($lote->avance == 0)
                                <br>
                                0%
                            @else
                                <div class="progress">
                                    <div class="progress-bar
                                        @php
if ($lote->avance == 0) {
                                                echo 'bg-secondary';
                                            }
                                            if ($lote->avance > 0 && $lote->avance < 30) {
                                                echo 'bg-warning';
                                            }
                                            if ($lote->avance>=30 && $lote->avance < 60) {
                                                echo 'bg-primary';
                                            }
                                            if ($lote->avance>=60) {
                                                echo 'bg-info';
                                            } @endphp
                                        "
                                        role="progressbar" aria-valuenow="{{ $lote->avance }}" aria-valuemin="0"
                                        aria-valuemax="100" style="width: {{ $lote->avance }}%">
                                        <span class="">{{ $lote->avance }}%</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-outline card-warning">
            <div class="card-header">
                <span class="card-title text-secondary">
                    <strong>Deudas asignadas</strong>
                </span>
                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Min/Max">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm dataTable"
                        style="font-size: 12px;">
                        <thead>
                            <tr class="table-warning">
                                <th class="align-middle">NUM. DOC</th>
                                <th class="align-middle">CLIENTE</th>
                                <th class="align-middle">DIRECCIÓN</th>
                                <th class="align-middle">FECHA CREDITO</th>
                                <th class="align-middle">VENCIMIENTO</th>
                                <th class="align-middle">ULT. PAGO</th>
                                <th class="align-middle text-right">SALDO</th>
                                <th class="align-middle text-center">ULT. CONTACTO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lotedeudas as $item)
                                <tr>
                                    <td class="align-middle">{{ $item->deuda->numdoc }}</td>
                                    <td class="align-middle">{{ $item->deuda->cliente }}</td>
                                    <td class="align-middle">{{ $item->deuda->direccioninterna }}</td>
                                    <td class="align-middle">{{ $item->deuda->fecha }}</td>
                                    <td class="align-middle">{{ $item->deuda->vence }}</td>
                                    <td class="align-middle">{{ $item->deuda->fechaultimopago }}</td>
                                    <td class="align-middle text-right">
                                        {{ $item->deuda->saldo }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ ultContacto($item->deuda->deudore_id) ? ultContacto($item->deuda->deudore_id) : '--' }}
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($item->finalizado)
                                            <span class="badge badge-pill badge-secondary">Finalizado</span>
                                        @else
                                            @can('procesardeuda')
                                                <a href="{{ route('procesodeuda', $item->id) }}"
                                                    class="btn btn-outline-info btn-sm">
                                                    <i class="fas fa-edit"></i> Procesar
                                                </a>
                                            @endcan

                                            {{-- <button class="btn btn-sm btn-outline-info"
                                        wire:click='loadDeuda({{$item->id}})' data-toggle="modal"
                                        data-target="#modalProcDeuda">
                                        <i class="fas fa-edit"></i> Procesar
                                    </button> --}}
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-secondary"><strong>No exiten
                                            resultados</strong>
                                    </td>
                                </tr>
                            @endforelse

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
            "order": [
                [6, "desc"] // Ordenar la sexta columna (montos de dinero con decimales) de mayor a menor
            ],
            "columnDefs": [{
                    "type": "num",
                    "targets": 0
                },
                {
                    "targets": 6,
                    "render": function(data, type, row) {
                        // Elimina el símbolo de moneda y las comas, luego convierte a número
                        var floatVal = parseFloat(data.replace(/[$,]/g, '')) || 0;

                        // Formatea el número con 2 decimales
                        return floatVal.toFixed(2);
                    },
                    "type": "num"
                }
            ],
            language: {
                url: '{{ asset('vendor/datatable/es-MX.json') }}',
            },
        });
    </script>
@endsection
