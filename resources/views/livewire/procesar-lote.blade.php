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
                    <a href="{{ route('mislotes',$lote->empresa_id) }}" type="button" class="btn btn-tool"
                        title="Volver">
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
                            <input type="text" class="form-control form-control-sm" readonly value="{{$lote->codigo}}">
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label>FECHA: </label>
                            <input type="text" class="form-control form-control-sm" readonly value="{{$lote->fecha}}">
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label>EMPRESA: </label>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{$lote->empresa_id?$lote->empresa->nombre:" NULL"}}">
                        </div>
                    </div>
                    <div class="col-12 col-xl-12">
                        <div class="form-group">
                            <label for="">Avance:</label>
                            @if ($lote->avance==0)
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
                                            }
                                        @endphp
                                        " role="progressbar" aria-valuenow="{{$lote->avance}}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{$lote->avance}}%">
                                    <span class="">{{$lote->avance}}%</span>
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
                                <td class="align-middle">{{$item->deuda->numdoc}}</td>
                                <td class="align-middle">{{$item->deuda->cliente}}</td>
                                <td class="align-middle">{{$item->deuda->direccioninterna}}</td>
                                <td class="align-middle">{{$item->deuda->fecha}}</td>
                                <td class="align-middle">{{$item->deuda->vence}}</td>
                                <td class="align-middle">{{$item->deuda->fechaultimopago}}</td>
                                <td class="align-middle text-right">{{number_format($item->deuda->saldo,2,'.')}}
                                </td>
                                <td class="align-middle text-center">
                                    {{ultContacto($item->deuda->deudore_id)?ultContacto($item->deuda->deudore_id):'--'}}
                                </td>
                                <td class="align-middle text-center">
                                    @if ($item->finalizado)
                                    <span class="badge badge-pill badge-secondary">Finalizado</span>
                                    @else
                                    @can('procesardeuda')
                                    <a href="{{route('procesodeuda',$item->id)}}" class="btn btn-outline-info btn-sm">
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
                                <td colspan="6" class="text-center text-secondary"><strong>No exiten resultados</strong>
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="modalProcDeuda" wire:ignore.self data-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-xl">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PROCESAR DEUDA ASIGNADA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div wire:loading wire:target="loadDeuda">
                        <span class="text-secondary">Cargando datos ...</span>
                        <div class="spinner-border spinner-border-sm text-secondary" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                    <div wire:loading.remove wire:target="loadDeuda">
                        @if ($lotedeuda)
                        <div class="callout callout-danger" style="background-color: #f5ecec">
                            <h5 class="text-danger">Datos Deuda</h5>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>NUM DOC</strong></span>
                                        </div>
                                        <input type="text" class="form-control" readonly
                                            value="{{$lotedeuda->deuda->numdoc}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>CLIENTE</strong></span>
                                        </div>
                                        <input type="text" class="form-control" readonly
                                            value="{{$lotedeuda->deuda->cliente}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>SALDO</strong></span>
                                        </div>
                                        <input type="text" class="form-control" readonly
                                            value="{{$lotedeuda->deuda->saldo}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>VENCIMIENTO</strong></span>
                                        </div>
                                        <input type="text" class="form-control" readonly
                                            value="{{$lotedeuda->deuda->vence}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>ULT. PAGO</strong></span>
                                        </div>
                                        <input type="text" class="form-control" readonly
                                            value="{{$lotedeuda->deuda->fechaultimopago}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>RANGO</strong></span>
                                        </div>
                                        <input type="text" class="form-control" readonly
                                            value="{{$lotedeuda->deuda->rango}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="callout callout-success" style="background-color: #ebf8f0">
                            <h5 class="text-success">Contacto con Cliente <small class="text-secondary"><i>(Campos
                                        editables)</i></small></h5>
                            <hr>
                            <div class="row">

                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>TELF. FIJO</strong></span>
                                        </div>
                                        <input type="text" class="form-control" wire:model.defer='telffijo'>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>TELF. CELULAR</strong></span>
                                        </div>
                                        <input type="text" wire:model.defer='telfcelular' class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>TELF. REF. 1</strong></span>
                                        </div>
                                        <input type="text" class="form-control" vwire:model.defer='telfref1'>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-2 mb-1">
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Contactado</strong></span>
                                        </div>
                                        <select class="form-control  @error('contactado') is-invalid @enderror"
                                            wire:model.defer="contactado">
                                            <option value="0">NO</option>
                                            <option value="1">SI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-1">
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Tipo Contacto</strong></span>
                                        </div>
                                        <select class="form-control @error('gestiontipo_id') is-invalid @enderror"
                                            wire:model="gestiontipo_id">
                                            <option value="">Seleccione un tipo</option>
                                            @foreach ($gestiontipos as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-1">
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Zona</strong></span>
                                        </div>
                                        <select class="form-control" wire:model.defer="zona_id">
                                            <option value="">Seleccione una Zona</option>
                                            @foreach ($zonas as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4 mb-1">
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Nombre Contacto</strong></span>
                                        </div>
                                        <input type="text" class="form-control" wire:model.defer='nombrecontacto'>
                                    </div>
                                </div>
                                @if ($lotedeuda->fechacontacto)
                                <div class="col-12">
                                    <span class="text-warning"><i><strong>Fecha de contacto anterior:</strong>
                                            {{$lotedeuda->fechacontacto .' '.$lotedeuda->horacontacto}}</i></span>
                                </div>
                                <hr>
                                @endif

                                <div class="col-12 mb-3">
                                    <label for="">Detalles del Contacto:</label>
                                    <textarea rows="2" class="form-control  @error('detalles') is-invalid @enderror"
                                        wire:model.defer='detalles'></textarea>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Programar próximo
                                                    contacto</strong></span>
                                        </div>
                                        <input type="date" class="form-control" wire:model.defer='proxcontacto'>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Programar vista de
                                                    cobro</strong></span>
                                        </div>
                                        <input type="datetime-local" class="form-control"
                                            wire:model.defer='fechahoracobro'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>

                    <div class="row">

                        <div class="col-12 col-md-4 mb-2">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"><i
                                    class="fas fa-ban"></i>
                                CANCELAR</button>
                        </div>

                    </div>


                </div>




            </div>
        </div>
    </div> --}}
</div>
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
