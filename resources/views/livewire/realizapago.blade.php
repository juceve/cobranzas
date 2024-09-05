<div>

    <div class="row padding-1 p-1">
        <div class="col-12 col-md-5 col-xl-4">
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Fecha y Hora</strong></span>
                </div>
                <input type="text" readonly value="{{ $compromisopago?->fechahoracompromiso }}" class="form-control">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Monto Comprometido</strong></span>
                </div>
                <input type="text" readonly value="{{ numToFloat($compromisopago->montocomprometido) }}"
                    class="form-control">
            </div>
        </div>
        <div class="col-12 col-md-7 col-xl-8 mb-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Anotaciones</strong></span>
                </div>
                <textarea name="anotaciones" class="form-control form-control-sm @error('anotaciones') is-invalid @enderror"
                    id="anotaciones" rows="3" placeholder="Anotaciones" style="font-size: 13.4px;" wire:model.lazy='anotaciones'></textarea>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group" wire:ignore>
        <label for="enablePago" class="text-primary">GENERAR PAGO: </label>
        <input type="checkbox" wire:model="enablePago" id="enablePago" data-bootstrap-switch data-off-color="secondary"
            data-on-color="primary" onclick="validateCheckbox()">
    </div>
    @error('monto')
        <small class="text-danger">Monto requerido</small>
    @enderror
    @error('metodopago_id')
        <small class="text-danger">Metodo de Pago requerido</small>
    @enderror

    <div class="d-none" id="divPago" wire:ignore.self>
        <div class="callout callout-info" style="background-color: #17a3b81a">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>NUM DOC:</label>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('monto') is-invalid @enderror"
                                wire:model='numdoc' readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                    data-target="#modalListaDeudas" title="Buscar otra Deuda"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Monto a Pagar:</label>
                        <input type="number" step="any" min="0"
                            class="form-control @error('monto') is-invalid @enderror" wire:model.lazy='montocomprometido'
                            name="monto">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Metodo Pago:</label>
                        <select name="metodopago_id" class="form-control @error('metodopago_id') is-invalid @enderror"
                            wire:model='metodopago_id'>
                            <option value="">Seleccione un metodo</option>
                            @foreach ($metodos as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Observaciones:</label>
                        <input type="text" class="form-control" name="ncobrador" wire:model.lazy='observaciones'>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-8 d-none">
                    <div class="form-group">
                        <label>Resultado:</label>
                        <input type="text" class="form-control" name="resultado">
                    </div>
                </div>
                <div class="col-12">

                    <div class="form-group">
                        <label for="archivo">Selecciona Archivos</label>
                        <input type="file" id="archivo" multiple class="form-control" wire:model='comprobantes'
                            onchange="handleFiles(this.files)">
                    </div>
                    <div class="preview" wire:ignore></div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-12" id="divRegistrar">
        <div wire:loading.remove>
            <button type="submit" class="btn btn-info col-12 col-md-6 col-xl-4" onclick='registrar()'>REGISTRAR <i
                class="fas fa-save"></i></button>
        </div>
        <div wire:loading>
            Procesando...<div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalListaDeudas" tabindex="-1" aria-labelledby="modalListaDeudasLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalListaDeudasLabel">Seleccione una Deuda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" style="font-size: 12px;">
                            <thead>
                                <tr class="table-info">
                                    <th>NUM DOC</th>
                                    <th>DIRECCIÓN</th>
                                    <th class="text-right">IMPORTE BS.</th>
                                    <th class="text-right">SALDO BS.</th>
                                    <th class="text-center">ULT. PAGO</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($deuda->deudore->deudas as $item)
                                    <tr>
                                        <td>{{ $item->numdoc }}</td>
                                        <td>{{ $item->direccion }}</td>
                                        <td class="text-right">{{ numToFloat($item->importe) }}</td>
                                        <td class="text-right">{{ numToFloat($item->saldo) }}</td>
                                        <td class="text-center">{{ $item->fechaultimopago?$item->fechaultimopago:'--' }}</td>
                                        <td class="text-right">
                                            <button class="btn btn-sm btn-outline-info" wire:click="cambiaDeuda({{$item->id}})" data-dismiss="modal">Seleccionar <i class="fas fa-check"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script src="{{ asset('vendor/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Inicializa el Bootstrap Switch
            $("#enablePago").bootstrapSwitch();
            const divPago = document.getElementById('divPago');
            // Añade un event listener para el cambio de estado
            $('#enablePago').on('switchChange.bootstrapSwitch', function(event, state) {
                if (state) {
                    divPago.classList.remove('d-none');
                    @this.set('enablePago', true);
                } else {
                    divPago.classList.add('d-none');
                    @this.set('enablePago', false);
                }
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

    <script>
        function registrar() {
            Swal.fire({
                title: "<span class='text-info'><strong>REGISTRAR PAGO</strong></span>",
                html: "<strong>Está seguro de realizar este proceso?</strong>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('registrar');
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#openModalBtn').click(function() {
                $('#detalleDeuda').modal('show');
            });

            $('#detalleDeuda').on('shown.bs.modal', function() {
                $(this).find('.modal-dialog').css('transform', 'translateX(0)');
            });

            $('#detalleDeuda').on('hidden.bs.modal', function() {
                $(this).find('.modal-dialog').css('transform', 'translateX(100%)');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#openModalBtn2').click(function() {
                $('#detalleContacto').modal('show');
            });

            $('#detalleContacto').on('shown.bs.modal', function() {
                $(this).find('.modal-dialog').css('transform', 'translateX(0)');
            });

            $('#detalleContacto').on('hidden.bs.modal', function() {
                $(this).find('.modal-dialog').css('transform', 'translateX(100%)');
            });
        });
    </script>
@endsection
