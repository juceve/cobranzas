<div>
    {{-- DataTable Livewire --}}
    <div class="row mb-2">
        <div class="input-group mb-1 col-12 col-sm-9 col-md-8">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input type="search" class="form-control" placeholder="Busqueda..." wire:model.debounce.500ms='search'>
        </div>
        <div class="col-12 col-md-1 col-xl-2 d-sm-none d-md-block mb-1 "></div>
        <div class="col-7 col-sm-3 col-xl-2 mb-1 ">
            <div class="d-flex align-items-center">
                <span>Mostrar</span> &nbsp;
                <select name="filas" id="filas" class="form-control" wire:model='filas'>
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
                <tr class="bg-dark text-white">
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
                    <th wire:click="sortBy('name')" style="cursor: pointer;">
                        NOMBRE
                        @if($sortField === 'name')
                        @if($sortDirection === 'asc')
                        ▲
                        @else
                        ▼
                        @endif
                        @endif
                    </th>
                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        EMAIL
                        @if($sortField === 'email')
                        @if($sortDirection === 'asc')
                        ▲
                        @else
                        ▼
                        @endif
                        @endif
                    </th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        @if ($resultados)
        {{ $resultados->links() }}
        @endif
    </div>
    {{-- DataTable Livewire --}}
</div>