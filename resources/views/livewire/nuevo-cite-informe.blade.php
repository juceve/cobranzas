<div>
    @section('title', 'Nuevo Informe')

    @section('content_header')
        <div class="container-fluid">
            <h4>Nuevo Informe</h4>
        </div>
    @endsection

    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-header text-primary">
                Formulario de Registro

                <div class="float-right">
                    {{-- @can('empresas.create') --}}
                    <a href="{{ route('citeinformes') }}" class="btn btn-outline-primary btn-sm float-right"
                        data-placement="left">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-12 col-md-4 mb-1">
                        <label>Empresa:</label>
                        <select wire:model.lazy='empresa_id' class="form-control form-control-sm">
                            <option value="">-- Seleccione una Empresa --</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-12 col-md-4 mb-2">
                        <label for="">Fecha Informe:</label>
                        <input type="date"
                            class="form-control form-control-sm @error('fecha')
                            is-invalid
                        @enderror"
                            wire:model.lazy='fecha'>
                    </div>

                    <div class="col-12 col-md-4 mb-2">
                        <label for="">Dirigido a:</label>
                        <input type="text"
                            class="form-control form-control-sm @error('receptor')
                            is-invalid
                        @enderror"
                            wire:model.lazy='receptor'>
                    </div>

                    <div class="col-12 col-md-4 mb-2">
                        <label for="">Cargo:</label>
                        <input type="text"
                            class="form-control form-control-sm @error('cargoreceptor')
                            is-invalid
                        @enderror"
                            wire:model.lazy='cargoreceptor'>
                    </div>

                    <div class="col-12 col-md-4 mb-2">
                        <label for="">Referencia:</label>
                        <input type="text"
                            class="form-control form-control-sm @error('referencia')
                            is-invalid
                        @enderror"
                            wire:model.lazy='referencia'>
                    </div>

                    <div class="col-12 col-md-4 mb-2">
                        <label for="">Del:</label>
                        <input type="date"
                            class="form-control form-control-sm @error('fechainicial')
                            is-invalid
                        @enderror"
                            wire:model.lazy='fechainicial'>
                    </div>

                    <div class="col-12 col-md-4 mb-2">
                        <label for="">Al:</label>
                        <input type="date"
                            class="form-control form-control-sm @error('fechafinal')
                            is-invalid
                        @enderror"
                            wire:model.lazy='fechafinal'>
                    </div>

                    <div class="col-12 mb-2">
                        <hr>
                        <label for="">Agregar puntos:</label>
                        <textarea
                            class="form-control @error('puntos')
                            is-invalid
                        @enderror mb-2"rows="2"
                            wire:model.lazy='detalle'></textarea>
                        <button class="btn btn-info btn-sm col-12 col-md-2" wire:click='addPunto'>
                            Agregar <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-12 mb-2">
                        @if (count($puntos))
                            <div class="table-responsive mt-2">
                                <table class="table table-sm table-hover table-striped" style="font-size: 13px;">
                                    <thead>
                                        <tr class="table-info">
                                            <th>DETALLE PUNTO</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($puntos as $item)
                                            <tr>
                                                <td class="align-middle">{{ $item }}</td>
                                                <td class="align-middle" style="width: 10px;">
                                                    <button class="btn btn-sm btn-outline-warning" title="Eliminar"
                                                        wire:click='delPunto({{ $i++ }})'>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <a href="{{ route('citeinformes') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-ban"></i> Cancelar
                        </a>
                    </div>
                    <div class="col-12 col-md-3">
                        <button class="btn btn-success btn-block" onclick="registrar()">
                            Registrar Cite <i class="fas fa-save"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        function registrar() {
            Swal.fire({
                title: "REGISTRAR INFORME",
                text: "Está seguro de realizar esta operación?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('registrar');
                }
            });
        }
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('abrirPestana', url => {
                window.open(url, '_blank');
            });
        });
    </script>
@endsection
