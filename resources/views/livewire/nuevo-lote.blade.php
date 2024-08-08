<div>
    @section('title', 'Nuevo Lote - ')

    {{-- @section('content_header')
    <h4>Nuevo Lote - {{$empresa->nombre}}</h4>
    @endsection --}}

    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12 col-md-7">

                <div class="card card-primary card-outline">
                    <div class="card-header text-primary">
                        <strong>DEUDAS</strong>
                        <div class="float-right">
                            <div class="d-flex">

                                <a href="javascript:void(0);" class="text-secondary"
                                    title="Seleccionar todos los registros" wire:click='selectItems(50)'>
                                    <small>

                                        <div wire:loading wire:target='selectItems'>
                                            Sel. 50 items
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <div wire:loading.remove wire:target='selectItems'>
                                            Sel. 50 items
                                            <i class="fas fa-angle-double-right"></i>
                                        </div>

                                    </small>
                                </a>
                                |
                                <a href="javascript:void(0);" class="text-secondary"
                                    title="Seleccionar todos los registros" wire:click='selectItems(100)'>
                                    <small>

                                        <div wire:loading wire:target='selectItems'>
                                            Sel. 100 items
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <div wire:loading.remove wire:target='selectItems'>
                                            Sel. 100 items
                                            <i class="fas fa-angle-double-right"></i>
                                        </div>

                                    </small>
                                </a>
                                |
                                <a href="javascript:void(0);" class="text-primary"
                                    title="Seleccionar todos los registros" wire:click='selectItems(0)'>
                                    <small>

                                        <div wire:loading wire:target='selectItems'>
                                            Sel. Todo
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <div wire:loading.remove wire:target='selectItems'>
                                            Sel. Todo
                                            <i class="fas fa-angle-double-right"></i>
                                        </div>

                                    </small>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="input-group mb-1 col-12 col-sm-5 col-xl-5 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="search" class="form-control form-control-sm" placeholder="Busqueda..."
                                    wire:model.debounce.500ms='search'>
                            </div>
                            <div class="input-group mb-1 col-12 col-sm-3 col-xl-3 mb-2">
                                <select class="form-control form-control-sm" wire:model='zona_id'
                                    style="font-size: 12px;">
                                    <option value="">Todas las Zonas</option>
                                    @foreach ($zonas as $zona)
                                    <option value="{{$zona->id}}">{{$zona->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-7 col-sm-4 col-xl-4 mb-2 ">
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
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-striped table-bordered text-nowrap"
                                style="font-size: 11px; vertical-align: middle">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Nro.</th>
                                        <th>NUM DOC</th>
                                        <th>CLIENTE</th>
                                        <th>ZONA</th>
                                        {{-- <th>RANGO</th> --}}
                                        <th>ULT. PAGO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($deudas as $deuda)
                                    <tr>
                                        <td class="align-middle">{{++$i}}</td>
                                        <td class="align-middle">{{$deuda['numdoc']}}</td>
                                        <td class="align-middle">{{$deuda['cliente']}}</td>
                                        <td class="align-middle">{{$deuda->zona_id?$deuda->zona->nombre:"Sin asignar"}}
                                        </td>
                                        {{-- <td class="align-middle">{{$deuda->rango}} --}}
                                        </td>
                                        <td class="align-middle">{{$deuda['fechaultimopago']}}</td>
                                        <td class="text-right align-middle">
                                            <button class="btn btn-outline-primary" style="font-size: 8px;"
                                                title="Seleccionar deuda" wire:click='selectDeuda({{$deuda->id}})'
                                                wire:loading.attr="disabled" wire:target="selectDeuda" {{ $isProcessing
                                                ? 'disabled' : '' }}>
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center align-middle"><strong>No existen
                                                registros</strong></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $deudas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="card  card-success card-outline" style="height: 595px;">
                    <div class="card-header">
                        <a href="javascript:void(0);" class="text-success" title="Quitar todos los registros"
                            wire:click='quitarAll'>
                            <small>
                                <div wire:loading wire:target='quitarAll'>

                                    <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    Quitar Todo
                                </div>
                                <div wire:loading.remove wire:target='quitarAll'>
                                    <i class="fas fa-angle-double-left"></i> Quitar Todo
                                </div>

                            </small>
                        </a>
                        <div class="float-right text-success">
                            <strong>NUEVO LOTE</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="max-height: 420px;">
                            <table class="table table-bordered table-sm table-striped table-head-fixed"
                                style="font-size: 11px;">
                                <thead>
                                    <tr>
                                        <th class="bg-success"></th>
                                        <th class="bg-success">#</th>
                                        <th class="bg-success">NUM DOC</th>
                                        <th class="bg-success">CLIENTE</th>
                                        <th class="text-right bg-success">SALDO</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $x =0;
                                    @endphp
                                    @forelse ($selectDeudas as $deuda)
                                    <tr>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-outline-danger" style="font-size: 10px;"
                                                title="Quitar Deuda" wire:click='quitarDeuda({{$i}})'>
                                                <i class="fas fa-angle-left"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">{{++$x}}</td>
                                        <td class="align-middle">{{$deuda['numdoc']}}</td>
                                        <td class="align-middle">{{$deuda['cliente']}}</td>
                                        <td class="text-right align-middle">{{number_format($deuda['saldo'],2,'.')}}
                                        </td>

                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center align-middle"><strong>No existen
                                                registros</strong></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if (count($selectDeudas))
                        <div class="row mt-3">
                            <div class="col-12 mb-2">
                                <select class="form-control form-control-sm" wire:model='selectUser'>
                                    <option value="">Seleccione un Operador</option>
                                    @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endforeach
                                </select>
                                @error('selectUser')
                                <span class="text-danger"><small>El campo Operador es obligatorio</small></span>
                                @enderror
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-sm btn-outline-info btn-block" wire:click='generarLote'>GENERAR
                                    LOTE <i class=" fas fa-cogs"></i></button>
                            </div>

                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>