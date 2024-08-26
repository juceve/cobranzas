<div>
    <div class="card">
        <div class="card-header bg-info">
            Listado de Deudores
        </div>
        <div class="card-body">
            <div>
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
                        <input type="search" class="form-control form-control-sm" placeholder="Busqueda..."
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
                    <table class="table table-bordered table-striped table-hover">
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
                                <th wire:click="sortBy('codigocliente')" style="cursor: pointer;">
                                    CODIGO
                                    @if($sortField === 'codigocliente')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('cliente')" style="cursor: pointer;">
                                    NOMBRE
                                    @if($sortField === 'cliente')
                                    @if($sortDirection === 'asc')
                                    ▲
                                    @else
                                    ▼
                                    @endif
                                    @endif
                                </th>
                                <th wire:click="sortBy('telfcelular')" style="cursor: pointer;">
                                    CELULAR
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
                            @if ($resultados)
                            @foreach ($resultados as $deudore)
                            <tr>
                                <td>{{$deudore->id}}</td>
                                <td>{{$deudore->codigocliente}}</td>
                                <td>{{$deudore->cliente}}</td>
                                <td>{{$deudore->telfcelular}}</td>
                                <td>{{$deudore->empresa->nombre?$deudore->empresa->nombre:'NULL'}}</td>
                                <td class="text-right">
                                    <form class="delete" action="{{ route('deudores.destroy', $deudore->id) }}"
                                        method="POST" onsubmit="return false">
                                        @can('deudores.index')
                                        <a class="btn btn-sm btn-outline-primary "
                                            href="{{ route('deudores.show', $deudore->id) }}" title="Ver Info"><i
                                                class="fa fa-fw fa-eye"></i></a>
                                        @endcan
                                        @can('deudores.edit')
                                        <a class="btn btn-sm btn-outline-success"
                                            href="{{ route('deudores.edit', $deudore->id) }}" title="Editar"><i
                                                class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                        @csrf
                                        @method('DELETE')
                                        {{-- @can('deudores.destroy')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            title="Eliminar DB"><i class="fa fa-fw fa-trash"></i></button>
                                        @endcan --}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else

                            <tr>
                                <td colspan="6" class="text-center"><strong><i>No se encontraron
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