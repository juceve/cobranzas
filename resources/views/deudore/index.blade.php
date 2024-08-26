@extends('adminlte::page')

@section('title', 'Deudores')

@section('content_header')
<h4>Deudores</h4>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @livewire('listado-deudores')
        </div>
    </div>
</div>
@endsection