@extends('layouts.app')

@section('template_title')
    {{ $recordatorio->name ?? __('Show') . " " . __('Recordatorio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Recordatorio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('recordatorios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Titulo:</strong>
                                    {{ $recordatorio->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cuerpo:</strong>
                                    {{ $recordatorio->cuerpo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $recordatorio->fecha }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $recordatorio->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Model:</strong>
                                    {{ $recordatorio->model }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Modelid:</strong>
                                    {{ $recordatorio->modelid }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Atendido:</strong>
                                    {{ $recordatorio->atendido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechahoraatencion:</strong>
                                    {{ $recordatorio->fechahoraatencion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
