@extends('adminlte::page')

@section('title', 'Zonas')

@section('content_header')
<h4>Zonas</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Zonas
                        </span>

                        <div class="float-right">
                            @can('zonas.create')
                            <a href="{{ route('zonas.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zonas as $zona)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $zona->nombre }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('zonas.destroy', $zona->id) }}" class="delete"
                                            onsubmit="return false" method="POST">
                                            <a class="btn btn-sm btn-outline-primary "
                                                href="{{ route('zonas.show', $zona->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i> </a>
                                            <a class="btn btn-sm btn-outline-success"
                                                href="{{ route('zonas.edit', $zona->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Eliminar"><i class="fa fa-fw fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection