@extends('adminlte::page')

@section('title', 'Actualiza DB Empresas')

@section('content_header')
<h1>Actualiza DB Empresas</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #f4e0a3">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
                @if ($registroact)
                <span class="">Ultima actualización: <strong>{{$registroact->fecha . " |
                        ".$registroact->hora}}</strong></span>
                @endif
            </span>

            <div class="float-right">
                <a href="{{ route('empresas.index') }}" class="btn btn-warning btn-sm float-right"
                    data-placement="left">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{-- <form action="{{route('upload.excelempresas')}}" class="dropzone" id="myexcel">
        </form> --}}

        <form action="{{route('upload.excelempresas',$empresa_id)}}" class="updateDB" onsubmit="return false"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputFile">Seleccione una DB en formato Excel</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" accept=".xlsx, .xls, .csv">
                        <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                    </div>

                </div>
            </div>

            <button class="btn btn-success col-12 col-md-6 col-lg-4" type="submit">Procesar Archivo <i
                    class="fas fa-cogs"></i></button>
        </form>
    </div>
</div>
@if ($registroact)
<div class="card card-outline card-info">
    <div class="card-header text-info">
        <strong>NUEVAS DEUDAS DE LA ULTIMA ACTUALIZACIÓN</strong>
    </div>
    <div class="card-body">
        <div class="table-reponsive">
            <table class="table table-bordered table-striped dataTable" style="font-size: 12px;">
                <thead>
                    <tr class="table-info">
                        <th>NRO</th>
                        <th>DEUDOR</th>
                        <th>NUMDOC</th>
                        <th>DIRECCION</th>
                        <th>IMPORTE</th>
                        <th>SALDO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $x=0;
                    @endphp

                    @forelse ($registroact->nuevadeudas as $item)
                    <tr>
                        <td>{{++$x}}</td>
                        <td>{{$item->deuda->cliente}}</td>
                        <td>{{$item->deuda->numdoc}}</td>
                        <td>{{$item->deuda->direccion}}</td>
                        <td>{{$item->deuda->importe}}</td>
                        <td>{{$item->deuda->saldo}}</td>
                        <td>
                            <a href="{{route('deudas.show',$item->deuda_id)}}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center"><strong>No existen resultados</strong></td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

    </div>
</div>
@endif
@endsection

@section('css')
@endsection
@section('plugins.Datatables', true)
@section('js')
<script src="{{asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>

<script>
    $('.updateDB').submit(function(e) {
        Swal.fire({
            title: 'Se va a actualizar la Base de Datos',
            text: "Esta seguro de realizar esta operación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, continuar!',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "info",
                    title: "Actualización iniciada",
                    html: "Por favor espere hasta que finalice el proceso y sea redireccionado.",
                        timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");                        
                    }
                })
                this.submit();
            }
        })
    });


    
</script>
<script>
    $('.dataTable').DataTable({
        destroy:true,
        language: {
        url: '{{asset("vendor/datatable/es-MX.json")}}',
    },
    });
</script>
@endsection