<div>
    @section('title', 'Deudas')

    @section('content_header')
    <h4>Deudas</h4>
    @endsection

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary">
                Listado de Deudas
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="input-group mb-1 col-12 col-sm-4 col-xl-5">
                        <select wire:model='empresa_id' class="form-control form-control-sm">
                            <option value=""><strong>-- Seleccione una Empresa --</strong></option>
                            @foreach ($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input-group mb-1 col-12 col-sm-5 col-xl-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="search" class="form-control form-control-sm"
                            placeholder="Busqueda por Codigo, Nombre Cliente, Num. Doc."
                            wire:model.debounce.500ms='search'>
                    </div>

                    <div class="col-7 col-sm-3 col-xl-2 mb-1 ">
                        <div class="d-flex align-items-center">
                            <span>Mostrar</span> &nbsp;
                            <select name="filas" id="filas" class="form-control form-control-sm" wire:model='filas'
                                style="font-size: 12px;">
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
                    <table class="table table-bordered table-hover" style="font-size: 12px;">
                        <thead>
                            <tr class="table-info">
                                <th wire:click="sortBy('id')" style="cursor: pointer;">
                                    ID
                                    @if($sortField === 'id')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('fecha')" style="cursor: pointer;">
                                    FECHA
                                    @if($sortField === 'fecha')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('codigocliente')" style="cursor: pointer;">
                                    COD. CLIENTE
                                    @if($sortField === 'codigocliente')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('cliente')" style="cursor: pointer;">
                                    NOMBRE CLIENTE
                                    @if($sortField === 'cliente')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('numdoc')" style="cursor: pointer;">
                                    NUM. DOC.
                                    @if($sortField === 'numdoc')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('fechaultimopago')" style="cursor: pointer;">
                                    ULT. FECHA PAGO
                                    @if($sortField === 'fechaultimopago')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th class="text-right" wire:click="sortBy('saldo')" style="cursor: pointer;">
                                    SALDO
                                    @if($sortField === 'saldo')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th class="text-right" wire:click="sortBy('importe')" style="cursor: pointer;">
                                    IMPORTE
                                    @if($sortField === 'importe')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('rango')" style="cursor: pointer;">
                                    RANGO
                                    @if($sortField === 'rango')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($resultados)
                            @foreach ($resultados as $deuda)
                            <tr class="table-{{$deuda->ctrlupdate?'success':'secondary'}}">
                                <td>{{$deuda->id}}</td>
                                <td>{{$deuda->fecha}}</td>
                                <td>{{$deuda->codigocliente}}</td>
                                <td>{{$deuda->cliente}}</td>
                                <td>{{$deuda->numdoc}}</td>
                                <td>{{$deuda->fechaultimopago}}</td>
                                <td class="text-right">{{number_format($deuda->saldo,2,'.')}}</td>
                                <td class="text-right">{{number_format($deuda->importe,2,'.')}}</td>
                                <td>{{$deuda->rango}}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-outline-primary "
                                        href="{{ route('deudas.show', $deuda->id) }}"><i class="fa fa-fw fa-eye"></i>
                                        Ver Info</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" class="text-center"><strong><i>No se encontraron
                                            resultados.</i></strong></td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    @if ($resultados)
                    {{ $resultados->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>