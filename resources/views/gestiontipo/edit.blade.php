@extends('adminlte::page')

@section('title', 'Editar Tipo de Gestion')

@section('content_header')
<h4>Editar Tipo de Gestion</h4>
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
                            <a href="{{ route('gestiontipos.index') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('gestiontipos.update', $gestiontipo->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('gestiontipo.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection