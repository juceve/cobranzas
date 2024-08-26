<div>
    @section('title', 'Procesamiento de Deuda')

    @section('content_header')
    <h4>Procesamiento de Deuda</h4>
    @endsection

    <div class="card card-outline card-lightblue">
        <div class="card-header">
            <span class="card-title text-lightblue">
                <h5>Detalles</h5>
            </span>
            <div class="card-tools">
                <a href="{{ route('procesarlote',$lotedeuda->lote_id) }}" type="button" class="btn btn-tool"
                    title="Volver">
                    <i class="fas fa-arrow-alt-circle-left"></i> Volver
                </a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Min/Max">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="background-color: #007bff0e">
            <small> <strong>Información de la Deuda:</strong></small>
            <button type="button" class="btn btn-tool" id="openModalDeuda"><i class="fas fa-search"></i>
                Mas Detalles</button>
            <div class="row mt-2">
                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>NUM DOC</strong></span>
                        </div>
                        <input type="text" class="form-control" readonly value="{{$deuda->numdoc}}">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>SALDO</strong></span>
                        </div>
                        <input type="text" class="form-control" readonly value="{{number_format($deuda->saldo,2,'.')}}">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>VENCIMIENTO</strong></span>
                        </div>
                        <input type="text" class="form-control" readonly value="{{$deuda->vence}}">
                    </div>
                </div>
                {{-- <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>ULT. PAGO</strong></span>
                        </div>
                        <input type="text" class="form-control" readonly value="{{$deuda->fechaultimopago}}">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>RANGO</strong></span>
                        </div>
                        <input type="text" class="form-control" readonly value="{{$deuda->rango}}">
                    </div>
                </div> --}}

                <div class="col-12 col-md-6 col-xl-8 mb-11">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>DIRECCIÓN</strong></span>
                        </div>
                        <input type="text" class="form-control" wire:model.lazy="direccioninterna">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mb-1">
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
            </div>
            <hr>
            <small> <strong>Información del Deudor:</strong></small><br>
            <div class="row mt-2">
                <div class="col-12 col-md-6 col-xl-4 mb-2">
                    <label>NOMBRE</label>
                    <input type="text" class="form-control" readonly value="{{$deuda->cliente}}">
                </div>
                <div class="col-12 col-md-6 col-xl-2 mb-2">
                    <label for="">Cant. Creditos</label>
                    <input type="text" class="form-control text-danger"
                        style="background-color: rgba(255, 13, 13, 0.087)" readonly value="{{$deudas->count()}}">
                </div>
                <div class="col-12 col-md-6 col-xl-3 mb-2">
                    <label for="">Total Deudas Bs.</label>
                    <input type="text" class="form-control text-danger" readonly
                        style="background-color: rgba(255, 13, 13, 0.087)"
                        value="{{numToFloat($deudas->sum('importe'))}}">
                </div>

                <div class="col-12 col-md-6 col-xl-3 mb-2">
                    <label for="">Total Saldos Bs.</label>
                    <input type="text" class="form-control text-danger"
                        style="background-color: rgba(255, 13, 13, 0.087)" readonly
                        value="{{numToFloat($deudas->sum('saldo'))}}">
                </div>

                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <a href="{{route('deudores.edit',$deuda->deudore_id)}}" target="__blank"
                        class="btn btn-warning btn-sm btn-block">Actualizar
                        Datos <i class="fas fa-edit"></i> </a>
                </div>
                {{-- <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>TELF. REF. 1</strong></span>
                        </div>
                        <input type="text" class="form-control" wire:model.lazy='telfref1'>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>TELF. REF. 2</strong></span>
                        </div>
                        <input type="text" class="form-control" wire:model.lazy='telfref2'>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>TELF. REF. 3</strong></span>
                        </div>
                        <input type="text" class="form-control" wire:model.lazy='telfref3'>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="card card-outline card-teal">
        <div class="card-header">
            <span class="card-title text-teal">
                <h5>Contacto </h5>
            </span>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" id="openModalBtn"><i class="fas fa-history"></i> Historial de
                    Contactos</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Min/Max">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="background-color: #20c9961a">

            <div class="row">


                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>Estado Contacto</strong></span>
                        </div>
                        <select class="form-control  @error('estadocontacto_id') is-invalid @enderror"
                            wire:model.defer="estadocontacto_id">
                            <option value="">Seleccione un estado</option>
                            @foreach ($estadocontactos as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mb-1">
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

                <div class="col-12 col-md-6 col-xl-4 mb-1">
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>Nombre Contacto</strong></span>
                        </div>
                        <input type="text" class="form-control @error('nombrecontacto') is-invalid @enderror"
                            wire:model.defer='nombrecontacto'>
                    </div>
                </div>
                <div class="col-12 mb-1">

                </div>
                {{-- @if ($lotedeuda->fechacontacto)
                <div class="col-12">
                    <span class="text-warning"><i><strong>Fecha de contacto anterior:</strong>
                            {{$lotedeuda->fechacontacto .' '.$lotedeuda->horacontacto}}</i></span>
                </div>
                <hr>
                @endif --}}

                <div class="col-12 col-md-6 mb-2">
                    <label><small><strong>Comentarios:</strong></small></label>
                    <textarea rows="3" class="form-control form-control-sm  @error('detalles') is-invalid @enderror"
                        wire:model.lazy='detalles'></textarea>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <label><small><strong>Resultado:</strong> <i>(Seleccione presionando Ctrl)</i></small></label>
                    <div class="form-group">
                        <select class="form-control form-control-sm @error('resultado')
                            is-invalid
                        @enderror" multiple="multiple"
                            style="width: 100%;height: 73px;" wire:model='resultado'>
                            @foreach ($resultcontactos as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <label><small><strong>SOLICITUD {{$lotedeuda->lote->empresa->nombre}}:</strong></small></label>
                    <textarea rows="2" class="form-control form-control-sm"
                        wire:model.lazy='solicitudempresa'></textarea>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <label><small><strong>ACCIÓN BLACK BIRD:</strong></small></label>
                    <textarea rows="2" class="form-control form-control-sm" wire:model.lazy='accionpropia'></textarea>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    @can('recordatorios.create')
                    <label><small><strong>Agendar nuevo contacto:</strong></small></label>
                    <div class="d-flex align-self-center">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                    wire:model='enableproxcontacto'>
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>

                        </div>
                        <input type="date" class="form-control form-control-sm @error('proxcontacto')
                            is-invalid
                        @enderror" @if (!$enableproxcontacto) disabled @endif wire:model='proxcontacto'>
                    </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
    @can('compromisopagos.create')
    <div class="card card-outline card-warning">
        <div class="card-header">
            <span class="card-title text-warning">
                <strong>Compromiso de Pago</strong>
            </span>
            <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Min/Max">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-3 mb-2">

                    <label><small><strong>Registrar compromiso de Pago:</strong></small></label>
                    <div class="d-flex align-self-center">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2"
                                    wire:model='enablecompromiso'>
                                <label class="custom-control-label" for="customSwitch2"></label>
                            </div>

                        </div>
                        <input type="datetime-local" class="form-control form-control-sm @error('fechahoracompromiso')
                            is-invalid
                        @enderror" @if (!$enablecompromiso) disabled @endif wire:model.lazy='fechahoracompromiso'>
                    </div>

                </div>
                <div class="col-12 col-md-4 col-xl-3 mb-2">
                    <label><small><strong>Monto comprometido:</strong></small></label>
                    <input type="number" step="any" class="form-control form-control-sm" @if (!$enablecompromiso)
                        disabled @endif wire:model.lazy='montocomprometido'>
                </div>
                <div class="col-12 mb-2">
                    <label><small><strong>Anotaciones:</strong></small></label>
                    <textarea class="form-control form-control-sm" rows="2" @if (!$enablecompromiso) disabled @endif
                        wire:model.lazy='anotaciones'></textarea>
                </div>
            </div>


        </div>
    </div>
    @endcan
    <hr>
    <div class="row justify-content-end">
        <div class="col-12 col-md-4 mb-2">
            <a href="{{route('procesarlote',$this->lotedeuda->lote_id)}}" class="btn btn-secondary btn-block"><i
                    class="fas fa-ban"></i> Cancelar</a>
        </div>
        <div class="col-12 col-md-4 mb-2 d-none">
            <button class="btn btn-info btn-block" wire:click='guardar(0)'>Guardar Cambios <i
                    class="fas fa-save"></i></button>
        </div>
        <div class="col-12 col-md-4 mb-2">
            <button class="btn btn-success btn-block" onclick="finalizar()">Finalizar Contacto <i
                    class="fas fa-save"></i></button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalHistorial" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="modalHistorialLabel" aria-hidden="true" style="height: 100%" wire:ignore>
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="customModalLabel">Historial de Contactos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="accHistorialContactos">
                        @forelse ($historialContactos as $contacto)
                        <div class="card card-sm">
                            <div class="card-header" id="headingOne" style="background-color: #17a3b82e">
                                <p class="mb-0">
                                    <button class="btn btn-link btn-block text-left
                                    @if ($contacto->id==$currentID)
                                       text-success
                                    @else
                                        text-secondary
                                    @endif

                                    " type="button" data-toggle="collapse" data-target="#coll{{$contacto->id}}"
                                        aria-expanded="true" aria-controls="coll{{$contacto->id}}"
                                        style="font-size: 12px;">
                                        <i class="fas fa-calendar-alt"></i> {{$contacto->fechacontacto}} |
                                        <i class="fas fa-clock"></i> {{$contacto->horacontacto}} | <i
                                            class="fas fa-user-edit"></i>
                                        {{$contacto->user_id?$contacto->user->name:""}}
                                        @if ($contacto->id==$currentID)
                                        | <i class="fas fa-edit"></i> Editando...
                                        @endif

                                    </button>
                                </p>
                            </div>

                            <div id="coll{{$contacto->id}}" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accHistorialContactos">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="table-responsive mt-2">
                                            <table class="table table-sm striped table-bordered"
                                                style="font-size: 12px;">
                                                <tr>
                                                    <td><strong>Tipo Contacto:</strong></td>
                                                    <td>{{$contacto->gestiontipo->nombre}}</td>
                                                    <td><strong>Estado:</strong></td>
                                                    <td>{{$contacto->estadocontacto->nombre}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Pers. Contactada:</strong></td>
                                                    <td colspan="3">{{$contacto->nombrecontacto}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Detalles:</strong></td>
                                                    <td colspan="3">{{$contacto->detalles}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td><strong>Resultado:</strong></td>
                                                    <td colspan="3">
                                                        @foreach ($contacto->resultados as $item)
                                                        {{$item->resultado->nombre}} <br>
                                                        @endforeach
                                                        @dump($contacto->resultados)

                                                    </td>
                                                </tr> --}}
                                                <tr>
                                                    <td><strong>Solicitud
                                                            {{$lotedeuda->lote->empresa->nombre}}:</strong></td>
                                                    <td colspan="3">{{$contacto->solicitudempresa}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Acciones Black Bird:</strong></td>
                                                    <td colspan="3">{{$contacto->accionpropia}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-center border"><i><strong>No existen registros...</strong></i></p>

                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary col-12" data-dismiss="modal"><i
                            class="fas fa-times"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detalleDeuda" data-backdrop="static" tabindex="-2" role="dialog"
        aria-labelledby="detalleDeudaLabel" aria-hidden="true" style="height: 100%">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="customModalLabel">Información de la Deuda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover table-sm" style="font-size: 13px;">
                        <tr>
                            <td style="width: 30%">
                                <strong>NUM DOC</strong>
                            </td>
                            <td>
                                {{$deuda->numdoc}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>SALDO</strong>
                            </td>
                            <td>
                                {{number_format($deuda->saldointerno,2,'.')}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>VENCIMIENTO</strong>
                            </td>
                            <td>
                                {{$deuda->vence}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>ULT. PAGO</strong>
                            </td>
                            <td>
                                {{$deuda->fechaultimopago}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>RANGO</strong>
                            </td>
                            <td>
                                {{$deuda->rango}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>DIRECCIÓN</strong>
                            </td>
                            <td>
                                {{$deuda->direccioninterna}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>ZONA</strong>
                            </td>
                            <td>
                                {{$deuda->zona_id?$deuda->zona->nombre:'Sin Asignar'}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>RANGO</strong>
                            </td>
                            <td>
                                {{$deuda->rango}}
                            </td>
                        </tr>
                    </table>

                    <small> <strong>Información del Deudor:</strong></small><br>
                    <table class="table table-bordered table-striped table-hover table-sm" style="font-size: 13px;">
                        <tr>
                            <td style="width: 30%">
                                <strong>NOMBRE</strong>
                            </td>
                            <td>
                                {{$deuda->deudore->cliente}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>TELF. FIJO</strong>
                            </td>
                            <td>
                                {{$deuda->deudore->telffijo}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>TELF. CELULAR</strong>
                            </td>
                            <td>
                                {{$deuda->deudore->telfcelular}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>TELF. REF. 1</strong>
                            </td>
                            <td>
                                {{$deuda->deudore->telfref1}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>TELF. REF. 2</strong>
                            </td>
                            <td>
                                {{$deuda->deudore->telfref2}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>TELF. REF. 3</strong>
                            </td>
                            <td>
                                {{$deuda->deudore->telfref3}}
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary col-12" data-dismiss="modal"><i
                            class="fas fa-times"></i>
                        Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('css')
<style>
    /* CSS personalizado para el modal */
    .modal-dialog-slideout {
        position: fixed;
        top: 0;
        right: 0;
        height: 100vh;
        /* Ocupa el 100% de la altura de la pantalla */
        width: 100%;
        margin: 0;
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }

    .modal.fade .modal-dialog-slideout {
        transform: translateX(100%);
    }

    .modal.show .modal-dialog-slideout {
        transform: translateX(0);
    }

    .modal-content {
        height: 100%;
        /* Asegura que el contenido ocupe toda la altura del modal */
    }

    .card-sm .card-header,
    .card-sm .card-body,
    .card-sm .card-footer {
        padding: 0.1rem;
        /* Ajusta este valor según tus necesidades */
    }

    .card-sm .card-title {
        margin-bottom: 0.5rem;
        /* Ajusta el margen inferior del título */
    }

    .card-sm .card-text {
        margin-bottom: 0.5rem;
        /* Ajusta el margen inferior del texto */
    }

    @media (min-width: 720px) {
        .modal-dialog-slideout {
            width: 40%;
        }
    }
</style>
@endsection
@section('js')
<!-- Incluye jQuery y Bootstrap JS al final del body -->
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}

<script>
    $(document).ready(function() {


  $('#openModalBtn').click(function() {
    $('#modalHistorial').modal('show');
  });

  $('#modalHistorial').on('shown.bs.modal', function () {
    $(this).find('.modal-dialog').css('transform', 'translateX(0)');
  });

  $('#modalHistorial').on('hidden.bs.modal', function () {
    $(this).find('.modal-dialog').css('transform', 'translateX(100%)');
  });

  $('#openModalDeuda').click(function() {
    $('#detalleDeuda').modal('show');
  });

  $('#detalleDeuda').on('shown.bs.modal', function () {
    $(this).find('.modal-dialog').css('transform', 'translateX(0)');
  });

  $('#detalleDeuda').on('hidden.bs.modal', function () {
    $(this).find('.modal-dialog').css('transform', 'translateX(100%)');
  });


});
</script>




<script>
    function finalizar() {
        Swal.fire({
            title: "<span class='text-info'><strong>FINALIZAR CONTACTO</strong></span>",
            html: "Se guardarán los datos y se finalizará el contacto. <br><strong>Está seguro de realizar este proceso?</strong>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, continuar",
            cancelButtonText: "No, cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('guardar',1);
            }
        });
    }
</script>



@endsection
