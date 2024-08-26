@extends('adminlte::page')

@section('title', 'Recordatorio')

@section('content_header')
<h4>Recordatorio</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header bg-info">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Detalle de Recordatorio
                        </span>

                        <div class="float-right">
                            <a href="{{ route('recordatorios.index') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('recordatorios.update', $recordatorio->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('recordatorio.form')
                        <hr>
                        <a href="{{route('procesodeuda', $recordatorio->modelo->id)}}" class="btn btn-primary">Generar
                            Nuevo Contacto <i class="fas fa-headset"></i></a>
                        <button class="btn btn-success">Marcar como Revisado <i class="fas fa-check"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="detalleDeuda" data-backdrop="static" tabindex="-1" role="dialog"
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
                <button type="button" class="btn btn-secondary col-12" data-dismiss="modal"><i class="fas fa-times"></i>
                    Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
  $('#openModalBtn').click(function() {
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
@endsection

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