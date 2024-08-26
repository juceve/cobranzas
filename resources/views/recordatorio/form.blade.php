<div class="row padding-1 p-1">
    <div class="row">
        <div class="col-12 col-md-6 mb-2">
            <strong>Fecha: </strong>
            {{$recordatorio->fecha}}
        </div>
        <div class="col-12 col-md-6 mb-2">
            <strong>Titulo: </strong>
            {{$recordatorio->titulo}}
        </div>
        <div class="col-12 col-md-6 mb-2">
            <strong>Detalles: </strong>
            {{$recordatorio->cuerpo}}
        </div>
        <div class="col-12 col-md-6 mb-2">
            <strong>Usuario: </strong>
            {{$recordatorio->user->name}}
        </div>
        <div class="col-12 col-md-6 mb-2">
            <strong>Estado: </strong>
            @if ( $recordatorio->atendido==0)
            <span class="badge badge-pill badge-warning">Pendiente</span>
            @else
            <span class="badge badge-pill badge-success">Revisado</span>
            @endif
        </div>
        <div class="col-12 col-md-6 mb-2">
            <button type="button" class="btn btn-outline-info btn-block btn-sm" id="openModalBtn"><i
                    class="fas fa-search"></i>
                Mas Detalles de Deuda</button>
        </div>
    </div>

</div>