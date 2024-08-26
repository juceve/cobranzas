<div>
    <div class="card">
        <div class="card-header bg-info">
            Listado de Lotes

        </div>
        <div class="card-body">
            <div>
                <div class="row mb-2">
                    <div class="input-group mb-1 col-12 col-sm-3 col-xl-4">
                        <select wire:model='empresa_id' class="form-control form-control-sm">
                            <option value=""><strong>-- Seleccione una Empresa --</strong></option>
                            @foreach ($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input-group mb-1 col-12 col-sm-3 col-xl-3 mb-2">
                        <select wire:model='user_id' class="form-control form-control-sm">
                            <option value=""><strong>Todos los Operadores</strong></option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input-group mb-1 col-12 col-sm-3 col-xl-3 mb-2">
                        <select wire:model='status' class="form-control form-control-sm">
                            <option value=""><strong>Todos</strong></option>
                            <option value="1"><strong>En proceso</strong></option>
                            <option value="0"><strong>Finalizados</strong></option>


                        </select>
                    </div>
                    <div class="col-12 col-sm-3 col-xl-2 mb-2">
                        @if ($empresa_id)
                        <a href="{{route('nuevolote',$empresa_id)}}" class="btn btn-sm btn-success btn-block"><i
                                class="fas fa-plus"></i>
                            Nuevo Lote</a>
                        @endif

                    </div>
                    <div class="col-7 col-sm-3 col-xl-2 mb-1 ">
                        <div class="d-flex align-items-center" style="font-size: 12px;">
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
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr class="table-info">
                                <th wire:click="sortBy('id')" style="cursor: pointer;">
                                    CODIGO
                                    @if($sortField === 'id')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('codigocliente')" style="cursor: pointer;">
                                    FECHA
                                    @if($sortField === 'codigocliente')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('cliente')" style="cursor: pointer;">
                                    NOMBRE OPERADOR
                                    @if($sortField === 'cliente')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('telfcelular')" style="cursor: pointer;">
                                    AVANCE
                                    @if($sortField === 'telfcelular')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th>
                                    EMPRESA
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resultados as $lote)
                            <tr>
                                <td>{{$lote->codigo}}</td>
                                <td>{{$lote->fecha}}</td>
                                <td>{{$lote->usuario}}</td>
                                <td style="vertical-align: middle">
                                    @if ($lote->avance==0)
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


                                </td>
                                <td>{{$lote->empresa?$lote->empresa:'NULL'}}</td>
                                <td class="text-right">
                                    {{-- <form class="delete" action="{{ route('lotes.destroy', $lote->id) }}"
                                        method="POST" onsubmit="return false">
                                        @can('lotes.index')
                                        <a class="btn btn-sm btn-outline-primary "
                                            href="{{ route('lotes.show', $lote->id) }}" title="Ver Info"><i
                                                class="fa fa-fw fa-eye"></i></a>
                                        @endcan
                                        @can('lotes.edit')
                                        <a class="btn btn-sm btn-outline-success"
                                            href="{{ route('lotes.edit', $lote->id) }}" title="Editar"><i
                                                class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                        @csrf
                                        @method('DELETE')
                                        @can('lotes.destroy')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            title="Eliminar DB"><i class="fa fa-fw fa-trash"></i></button>
                                        @endcan
                                    </form> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center"><strong><i>No se encontraron
                                            resultados.</i></strong></td>
                            </tr>
                            @endforelse
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