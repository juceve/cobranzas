@extends('adminlte::page')

@section('title')
Users
@endsection

@section('content_header')
<h1>Usuarios</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Listado de Usuarios
                        </span>

                        <div class="float-right">
                            <a href="#" class="btn btn-primary btn-sm float-right" data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body bg-white">
                    @livewire('tablas.tabla-users')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection