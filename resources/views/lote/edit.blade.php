@extends('adminlte::page')

@section('title', 'Procesar Lote')

@section('content_header')
<h4>Procesar Lote</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header bg-info">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Detalles del Lote
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
                    <form method="POST" action="{{ route('lotes.update', $lote->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('lote.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection