@extends('adminlte::page')

@section('title', 'Recordatorios')

@section('content_header')
<h4>Recordatorios</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Recordatorios
                        </span>

                        <div class="float-right">
                            {{-- @can('empresas.create')
                            <a href="{{ route('compromisopagos.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            @endcan --}}
                        </div>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Titulo</th>
                                    <th>Cuerpo</th>
                                    <th>Fecha</th>
                                    <th>User Id</th>
                                    <th>Model</th>
                                    <th>Modelid</th>
                                    <th>Atendido</th>
                                    <th>Fechahoraatencion</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recordatorios as $recordatorio)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $recordatorio->titulo }}</td>
                                    <td>{{ $recordatorio->cuerpo }}</td>
                                    <td>{{ $recordatorio->fecha }}</td>
                                    <td>{{ $recordatorio->user_id }}</td>
                                    <td>{{ $recordatorio->model }}</td>
                                    <td>{{ $recordatorio->modelid }}</td>
                                    <td>{{ $recordatorio->atendido }}</td>
                                    <td>{{ $recordatorio->fechahoraatencion }}</td>

                                    <td>
                                        <form action="{{ route('recordatorios.destroy', $recordatorio->id) }}"
                                            method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('recordatorios.show', $recordatorio->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('recordatorios.edit', $recordatorio->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $recordatorios->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection