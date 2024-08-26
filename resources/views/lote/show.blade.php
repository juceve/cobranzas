@extends('layouts.app')

@section('template_title')
    {{ $lote->name ?? __('Show') . " " . __('Lote') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Lote</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('lotes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $lote->fecha }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Asignado:</strong>
                                    {{ $lote->asignado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Avance:</strong>
                                    {{ $lote->avance }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empresa Id:</strong>
                                    {{ $lote->empresa_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $lote->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $lote->status }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
