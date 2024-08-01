@extends('layouts.app')

@section('template_title')
    {{ $lotedeuda->name ?? __('Show') . " " . __('Lotedeuda') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Lotedeuda</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('lotedeudas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Lote Id:</strong>
                                    {{ $lotedeuda->lote_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Deuda Id:</strong>
                                    {{ $lotedeuda->deuda_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechahoracobro:</strong>
                                    {{ $lotedeuda->fechahoracobro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Finalizado:</strong>
                                    {{ $lotedeuda->finalizado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
