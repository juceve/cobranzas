<div>
    @section('title', 'Nuevo Usuario ')

    @section('content_header')
    <h4>Nuevo Usuario</h4>
    @endsection
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-info">
                Formulario de Registro
                <div class="float-right">
                    <a href="{{route('users')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left">
                            Volver</i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nombre completo" wire:model.lazy='name'>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        id="exampleInputEmail1" placeholder="Correo electronico" wire:model.lazy='email'>
                </div>
                <div class="form-group">
                    <label>Cedula Identidad</label>
                    <input type="text" class="form-control @error('cedula') is-invalid @enderror"
                        placeholder="Cedula de identidad" wire:model.lazy='cedula'>
                </div>
                <div class="form-group">
                    <label>Asignar Rol</label>
                    <select class="form-control @error('role_id') is-invalid @enderror" wire:model.lazy='role_id'>
                        <option value="">Seleccione un Rol</option>
                        @foreach ($roles as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <button class="btn btn-primary col-12 col-md-6 col-xl-3" onclick="registrar()">Registrar Usuario <i
                        class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    function registrar(){
            Swal.fire({
            title: "<span class='text-info'><strong>CREAR NUEVO USUARIO</strong></span>",
            html: "Está seguro de realizar este proceso?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, continuar",
            cancelButtonText: "No, cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('registrar');
            }
        });
        }
</script>
@endsection