@extends('adminlte::page')

@section('title', 'Atención de Compromiso de Pago')

@section('content_header')
<h4>Atención de Compromiso de Pago</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-lightblue">
                <div class="card-header">
                    <span class="card-title text-lightblue">
                        <h5>Información de la Deuda</h5>
                    </span>
                    <div class="card-tools">
                        <a href="{{ route('compromisopagos.index') }}" type="button" class="btn btn-tool"
                            title="Volver">
                            <i class="fas fa-arrow-alt-circle-left"></i> Volver
                        </a>
                        <button type="button" class="btn btn-tool" id="openModalBtn"><i class="fas fa-search"></i>
                            Mas Detalles</button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Min/Max">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="background-color: #007bff0e">
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
                                <input type="text" class="form-control" readonly
                                    value="{{number_format($deuda->saldointerno,2,'.')}}">
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
                        <div class="col-12 col-md-6 col-xl-12 mb-1">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>DEUDOR</strong></span>
                                </div>
                                <input type="text" class="form-control" readonly value="{{$deuda->cliente}}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-12">

            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="card-title text-info">
                        <h5>Detalles del Compromiso de Pago</h5>
                    </span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" id="openModalBtn2"><i class="fas fa-search"></i>
                            Contacto Previo</button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Min/Max">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('compromisopagos.update', $compromisopago->id) }}" role="form"
                        class="registrar" onsubmit="return false" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="row padding-1 p-1">
                            <div class="col-12 col-md-5 col-xl-4">
                                <div class="input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>Fecha y Hora</strong></span>
                                    </div>
                                    <input type="text" readonly value="{{$compromisopago?->fechahoracompromiso}}"
                                        class="form-control">
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>Monto Comprometido</strong></span>
                                    </div>
                                    <input type="text" readonly
                                        value="{{numToFloat($compromisopago->montocomprometido)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-7 col-xl-8 mb-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>Anotaciones</strong></span>
                                    </div>
                                    <textarea name="anotaciones"
                                        class="form-control form-control-sm @error('anotaciones') is-invalid @enderror"
                                        id="anotaciones" rows="3" placeholder="Anotaciones"
                                        style="font-size: 13.4px;">{{ old('anotaciones', $compromisopago?->anotaciones) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="enablePago" class="text-primary">GENERAR PAGO: </label>
                            <input type="checkbox" name="enablePago" id="enablePago" data-bootstrap-switch
                                data-off-color="secondary" data-on-color="primary" onclick="validateCheckbox()">
                        </div>
                        @error('monto')
                        <small class="text-danger">Monto requerido</small>
                        @enderror
                        @error('metodopago_id')
                        <small class="text-danger">Metodo de Pago requerido</small>
                        @enderror

                        <div class="d-none" id="divPago">
                            <div class="callout callout-info" style="background-color: #17a3b81a">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="form-group">
                                            <label>Monto a Pagar:</label>
                                            <input type="number" step="any" min="0"
                                                class="form-control @error('monto') is-invalid @enderror"
                                                value="{{ $compromisopago->montocomprometido}}" name="monto">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="form-group">
                                            <label>Metodo Pago:</label>
                                            <select name="metodopago_id"
                                                class="form-control @error('metodopago_id') is-invalid @enderror"
                                                value="{{ old('metodopago_id', $pago?->metodopago_id) }}">
                                                <option value="">Seleccione un metodo</option>
                                                @foreach ($metodos as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="form-group">
                                            <label>Observaciones:</label>
                                            <input type="text" class="form-control" name="ncobrador">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-8 d-none">
                                        <div class="form-group">
                                            <label>Resultado:</label>
                                            <input type="text" class="form-control" name="resultado">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-8">

                                        <div class="form-group">
                                            <label for="archivo">Selecciona Archivos</label>
                                            <input type="file" id="archivo" name="comprobantes[]" multiple
                                                class="form-control" onchange="handleFiles(this.files)">
                                        </div>
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12" id="divRegistrar">
                            <button type="submit" class="btn btn-info col-12 col-md-6 col-xl-4">REGISTRAR <i
                                    class="fas fa-save"></i></button>
                        </div>
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

<div class="modal fade" id="detalleContacto" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="detalleContactoLabel" aria-hidden="true" style="height: 100%">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="customModalLabel">Información del Contacto Previo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover table-sm" style="font-size: 13px;">
                    <tr>
                        <td style="width: 30%">
                            <strong>Fecha y Hora</strong>
                        </td>
                        <td>
                            {{$contacto->fechacontacto .' '.$contacto->horacontacto}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Persona Contacto</strong>
                        </td>
                        <td>
                            {{$contacto->nombrecontacto}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Tipo Contacto</strong>
                        </td>
                        <td>
                            {{$contacto->gestiontipo->nombre}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Estado</strong>
                        </td>
                        <td>
                            {{$contacto->estadocontacto->nombre}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Detalles</strong>
                        </td>
                        <td>
                            {{$contacto->detalles}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Resultado</strong>
                        </td>
                        <td>
                            {{$contacto->resultado?$contacto->resultado:'N/A'}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Solicitud {{$contacto->lotedeuda->deuda->deudore->empresa->nombre}}</strong>
                        </td>
                        <td>
                            {{$contacto->solicitudempresa?$contacto->solicitudempresa:'N/A'}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Accion BlackBird</strong>
                        </td>
                        <td>
                            {{$contacto->accionpropia?$contacto->accionpropia:'N/A'}}
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
@section('css')
<style>
    .preview img,
    .preview .file-icon {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .preview div {
        position: relative;
        display: inline-block;
    }

    .preview .remove-btn {
        position: absolute;
        top: 0;
        right: 0;
        background: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }


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
<!-- Bootstrap Switch -->
<script src="{{asset('vendor/bootstrap-switch/js/bootstrap-switch.js')}}"></script>
<script>
    $(document).ready(function() {
        // Inicializa el Bootstrap Switch
        $("#enablePago").bootstrapSwitch();
        const divPago = document.getElementById('divPago');
        // Añade un event listener para el cambio de estado
        $('#enablePago').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state) {
                divPago.classList.remove('d-none');
            } else {
                divPago.classList.add('d-none');
            }
        });
    });
</script>

<script>
    $('.registrar').submit(function(e) {
        Swal.fire({
            title: 'REGISTRAR OPERACIÓN',
            text: "Esta seguro de realizar esta operación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, continuar!',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>

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

<script>
    $(document).ready(function() {
  $('#openModalBtn2').click(function() {
    $('#detalleContacto').modal('show');
  });

  $('#detalleContacto').on('shown.bs.modal', function () {
    $(this).find('.modal-dialog').css('transform', 'translateX(0)');
  });

  $('#detalleContacto').on('hidden.bs.modal', function () {
    $(this).find('.modal-dialog').css('transform', 'translateX(100%)');
  });
});
</script>

<script>
    let fileArray = [];

        function handleFiles(files) {
            const preview = document.querySelector('.preview');
            preview.innerHTML = '';
            fileArray = Array.from(files);

            fileArray.forEach((file, index) => {
                const fileReader = new FileReader();
                const div = document.createElement('div');
                div.classList.add('d-inline-block', 'position-relative');

                if (file.type.startsWith('image/')) {
                    fileReader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        div.appendChild(img);
                    }
                    fileReader.readAsDataURL(file);
                } else {
                    const fileIcon = document.createElement('div');
                    fileIcon.classList.add('file-icon');
                    fileIcon.textContent = file.name.split('.').pop().toUpperCase();
                    div.appendChild(fileIcon);
                }

                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'position-absolute', 'top-0', 'right-0');
                removeButton.textContent = 'X';
                removeButton.onclick = function(e) {
                    e.preventDefault();
                    fileArray[index] = null;
                    div.remove();
                    updateFileList();
                }
                div.appendChild(removeButton);

                preview.appendChild(div);
            });
        }

        function updateFileList() {
            const input = document.getElementById('archivo');
            const dataTransfer = new DataTransfer();
            fileArray.forEach(file => {
                if (file) {
                    dataTransfer.items.add(file);
                }
            });
            input.files = dataTransfer.files;
        }

        document.getElementById('archivo').addEventListener('change', function() {
            handleFiles(this.files);
        });
</script>



{{-- <script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = ''; 

    Array.from(event.target.files).forEach((file, index) => {
        const fileReader = new FileReader();
        fileReader.onload = function(e) {
            const div = document.createElement('div');
            div.classList.add('mr-2', 'mb-2');
            div.dataset.index = index;

            const removeBtn = document.createElement('button');
            removeBtn.classList.add('remove-btn');
            removeBtn.innerHTML = '×';
            removeBtn.addEventListener('click', function() {
                div.remove();
                const fileList = Array.from(document.getElementById('fileInput').files);
                fileList.splice(index, 1);
                const dataTransfer = new DataTransfer();
                fileList.forEach(file => dataTransfer.items.add(file));
                document.getElementById('fileInput').files = dataTransfer.files;
                if(fileList.length==0){
                    document.getElementById('fileInput').value='';
                }
                
            });

            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail');
                div.appendChild(img);
            } else {
                const icon = document.createElement('div');
                icon.classList.add('file-icon', 'bg-secondary', 'text-white', 'd-flex', 'align-items-center', 'justify-content-center');
                const extension = file.name.split('.').pop().toUpperCase();
                icon.innerText = extension;
                div.appendChild(icon);
            }

            div.appendChild(removeBtn);
            preview.appendChild(div);
        };
        fileReader.readAsDataURL(file);
    });
});


</script> --}}
@endsection