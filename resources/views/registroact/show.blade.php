@extends('layouts.app')

@section('template_title')
    {{ $registroact->name ?? __('Show') . " " . __('Registroact') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Registroact</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('registroacts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Url:</strong>
                                    {{ $registroact->url }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $registroact->fecha }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hora:</strong>
                                    {{ $registroact->hora }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empresa Id:</strong>
                                    {{ $registroact->empresa_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $registroact->user_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
