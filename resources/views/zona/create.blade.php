@extends('adminlte::page')

@section('title', 'Nueva Zona')

@section('content_header')
<h4>Nueva Zona</h4>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header bg-info">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Formulario de Registro
                        </span>

                        <div class="float-right">
                            <a href="{{ route('zonas.index') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('zonas.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('zona.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection