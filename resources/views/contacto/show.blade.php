@extends('layouts.app')

@section('template_title')
    {{ $contacto->name ?? __('Show') . " " . __('Contacto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Contacto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('contactos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Lotedeuda Id:</strong>
                                    {{ $contacto->lotedeuda_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estadocontacto Id:</strong>
                                    {{ $contacto->estadocontacto_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Gestiontipo Id:</strong>
                                    {{ $contacto->gestiontipo_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechacontacto:</strong>
                                    {{ $contacto->fechacontacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horacontacto:</strong>
                                    {{ $contacto->horacontacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombrecontacto:</strong>
                                    {{ $contacto->nombrecontacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Proxcontacto:</strong>
                                    {{ $contacto->proxcontacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Detalles:</strong>
                                    {{ $contacto->detalles }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Resultado:</strong>
                                    {{ $contacto->resultado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Solicitudempresa:</strong>
                                    {{ $contacto->solicitudempresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Accionpropia:</strong>
                                    {{ $contacto->accionpropia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Urlfoto:</strong>
                                    {{ $contacto->urlfoto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $contacto->status }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
