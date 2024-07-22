@extends('layouts.app')

@section('template_title')
    {{ $deudore->name ?? __('Show') . " " . __('Deudore') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Deudore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('deudores.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigocliente:</strong>
                                    {{ $deudore->codigocliente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cliente:</strong>
                                    {{ $deudore->cliente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Docid:</strong>
                                    {{ $deudore->docid }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipodoc Id:</strong>
                                    {{ $deudore->tipodoc_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechanacimiento:</strong>
                                    {{ $deudore->fechanacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telffijo:</strong>
                                    {{ $deudore->telffijo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telfcelular:</strong>
                                    {{ $deudore->telfcelular }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telfref1:</strong>
                                    {{ $deudore->telfref1 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telfref2:</strong>
                                    {{ $deudore->telfref2 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telfref3:</strong>
                                    {{ $deudore->telfref3 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nacionalidad:</strong>
                                    {{ $deudore->nacionalidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pais:</strong>
                                    {{ $deudore->pais }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ciudad:</strong>
                                    {{ $deudore->ciudad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Domcoorx:</strong>
                                    {{ $deudore->domcoorx }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Domcoory:</strong>
                                    {{ $deudore->domcoory }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Domdireccion:</strong>
                                    {{ $deudore->domdireccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Trabcoorx:</strong>
                                    {{ $deudore->trabcoorx }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Trabcoory:</strong>
                                    {{ $deudore->trabcoory }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Trabdireccion:</strong>
                                    {{ $deudore->trabdireccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empresa Id:</strong>
                                    {{ $deudore->empresa_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
