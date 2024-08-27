<div>
    @section('title', 'Reporte Anticuación')

    @section('content_header')
        <h4>Reporte Anticuación</h4>
    @endsection

    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="input-group mb-1 col-12 col-md-3">
                        <select wire:model='empresa_id' class="form-control form-control-sm">
                            <option value=""><strong>-- Seleccione una Empresa --</strong></option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-7 col-md-3 mb-2 ">
                        @if (count($resultados))
                            <button class="btn btn-success btn-sm btn-block" wire:click='exporExcel'>Exportar <i
                                    class="fas fa-file-excel"></i></button>
                        @endif
                    </div>
                    {{-- <div class="col-7 col-md-2 mb-2 ">
                        <div class="d-flex align-items-center" style="font-size: 12px;">
                            <span>Mostrar</span> &nbsp;
                            <select name="filas" id="filas" class="form-control form-control-sm"
                                wire:model='filas' style="font-size: 12px;">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="100">100</option>
                            </select> &nbsp;
                            <span>filas</span>
                        </div>
                    </div> --}}
                </div>
                <hr>
                <h3 class="mb-3 text-center">REPORTE DE ANTICUACIÓN</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-nowrap dataTable" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th colspan="7"></th>
                                <th class="bg-info text-center" colspan="{{count($anticuaciones)}}">ANTICUACIÓN</th>
                            </tr>
                            <tr class="bg-info text-center">
                                <th class="align-middle">Nro.</th>
                                <th class="align-middle">COD. CLIENTE</th>
                                <th class="align-middle">CLIENTE</th>
                                <th class="align-middle" >TOTAL LIMITE DE CREDITO <br> (BS)</th>
                                <th class="align-middle" >TOTAL IMPORTE DE CREDITO <br> (BS)</th>
                                <th class="align-middle" >TOTAL CANCELADO <br> (BS)</th>
                                <th class="align-middle" >TOTAL SALDO <br> (BS)</th>
                                @foreach ($anticuaciones as $item)
                                 <th class="align-middle">{{$item->anticuacion}}</th>
                                @endforeach

                                {{-- <th>COBRADOR</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-right">MONTO (BS)</th>
                                <th class="text-center">RESULTADO</th>
                                <th>METODO PAGO</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resultados as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->codigocliente }}</td>
                                    <td>{{ $item->cliente }}</td>
                                    <td class="text-right">{{ numToFloat($item->limitecredito) }}</td>
                                    <td class="text-right">{{ numToFloat($item->totalimporte) }}</td>
                                    <td class="text-right">{{ numToFloat($item->totalcancelado) }}</td>
                                    <td class="text-right">{{ numToFloat($item->totalsaldo) }}</td>
                                    @foreach ($anticuaciones as $ant_item)
                                        <td class="text-right">
                                            @if ($ant_item->anticuacion==$item->anticuacion)
                                                {{ numToFloat($item->totalsaldo) }}
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center"><strong>No existen resultados.</strong></td>
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
        destroy:true,
        columnDefs: [
            { "type": "num", "targets": 0 }  // Aplica el tipo numérico a la primera columna
        ],
        language: {
        url: '{{asset("vendor/datatable/es-MX.json")}}',
    },
    });
</script>
@endsection
