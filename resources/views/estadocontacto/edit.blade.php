@extends('adminlte::page')

@section('title', 'Editar Estado Contacto')

@section('content_header')
<h4>Editar Estado Contacto</h4>
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
                            <a href="{{ route('estadocontactos.index') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('estadocontactos.update', $estadocontacto->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('estadocontacto.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection