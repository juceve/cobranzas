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
                            <a href="javascript:void(0);" class="text-primary" title="Seleccionar todos los registros"
                                wire:click='selectAll'>
                                <small>Sel. Todo <i class="fas fa-angle-double-right"></i></small>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="input-group mb-1 col-12 col-sm-8 col-xl-8 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="search" class="form-control form-control-sm" placeholder="Busqueda..."
                                    wire:model.debounce.500ms='search'>
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
                                        <th>NUM DOC</th>
                                        <th>CLIENTE</th>
                                        <th>IMPORTE</th>
                                        <th>SALDO</th>
                                        <th>ULT. PAGO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($deudas as $deuda)
                                    <tr>
                                        <td class="align-middle">{{$deuda['numdoc']}}</td>
                                        <td class="align-middle">{{$deuda['cliente']}}</td>
                                        <td class="text-right align-middle">{{number_format($deuda['importe'],2,'.')}}
                                        </td>
                                        <td class="text-right align-middle">{{number_format($deuda['saldo'],2,'.')}}
                                        </td>
                                        <td class="align-middle">{{$deuda['fechaultimopago']}}</td>
                                        <td class="text-right align-middle">
                                            <button class="btn btn-outline-primary" style="font-size: 8px;"
                                                title="Seleccionar deuda" wire:click='selectDeuda({{$deuda->id}})'>
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center align-middle"><strong>No existen
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
                            <small> <i class="fas fa-angle-double-left"></i> Quitar Todo</small>
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
                                        <th class="bg-success">NUM DOC</th>
                                        <th class="bg-success">CLIENTE</th>
                                        <th class="bg-success">SALDO</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i =0;
                                    @endphp
                                    @forelse ($selectDeudas as $deuda)
                                    <tr>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-outline-danger" style="font-size: 10px;"
                                                title="Quitar Deuda" wire:click='quitarDeuda({{$i}})'>
                                                <i class="fas fa-angle-left"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">{{$deuda['numdoc']}}</td>
                                        <td class="align-middle">{{$deuda['cliente']}}</td>
                                        <td class="align-middle">{{$deuda['saldo']}}</td>

                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center align-middle"><strong>No existen
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