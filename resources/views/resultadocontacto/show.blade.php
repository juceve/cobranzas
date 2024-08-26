@extends('layouts.app')

@section('template_title')
    {{ $resultadocontacto->name ?? __('Show') . " " . __('Resultadocontacto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Resultadocontacto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('resultadocontactos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Resultado Id:</strong>
                                    {{ $resultadocontacto->resultado_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contacto Id:</strong>
                                    {{ $resultadocontacto->contacto_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
