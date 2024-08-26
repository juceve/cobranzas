@extends('layouts.app')

@section('template_title')
    {{ $compromisopago->name ?? __('Show') . " " . __('Compromisopago') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compromisopago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('compromisopagos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechahoracompromiso:</strong>
                                    {{ $compromisopago->fechahoracompromiso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Montocomprometido:</strong>
                                    {{ $compromisopago->montocomprometido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lotedeuda Id:</strong>
                                    {{ $compromisopago->lotedeuda_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Anotaciones:</strong>
                                    {{ $compromisopago->anotaciones }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechahoracontacto:</strong>
                                    {{ $compromisopago->fechahoracontacto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $compromisopago->user_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
