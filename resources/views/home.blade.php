@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@endsection

@section('content')
<p>Welcome to this beautiful admin panel.</p>
@endsection

@section('js')
<script>
    Swal.fire("SweetAlert2 is working!");
</script>
@endsection