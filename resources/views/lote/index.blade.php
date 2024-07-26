@extends('adminlte::page')

@section('title', 'Lotes')

@section('content_header')
<h4>Lotes</h4>
@endsection

@section('content')
<div class="container-fluid">
    @livewire('listado-lotes')
</div>
@endsection