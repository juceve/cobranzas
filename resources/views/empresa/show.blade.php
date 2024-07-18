@extends('adminlte::page')

@section('title', 'Información de Empresa')

@section('content_header')
<h4>Información de Empresa</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Datos de la Empresa
                        </span>

                        <div class="float-right">
                            <a href="{{ route('empresas.index') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body bg-white">

                    <div class="form-group mb-2 mb20">
                        <strong>Nombre:</strong>
                        {{ $empresa->nombre }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Direccion:</strong>
                        {{ $empresa->direccion }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Nit:</strong>
                        {{ $empresa->nit }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Email:</strong>
                        {{ $empresa->email }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Telefono:</strong>
                        {{ $empresa->telefono }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Persona contacto:</strong>
                        {{ $empresa->personacontacto }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Celular contacto:</strong>
                        {{ $empresa->celularcontacto }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Estado:</strong>
                        @if ($empresa->status)
                        <span class="badge badge-pill badge-success">Activo</span>
                        @else
                        <span class="badge badge-pill badge-secondary">Inactivo</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection