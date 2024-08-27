<div>
    @section('title', 'Reporte Contactos')

    @section('content_header')
    <h4>Reporte Contactos</h4>
    @endsection


    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="input-group mb-1 col-12 col-md-3">
                        <select wire:model='empresa_id' class="form-control form-control-sm">
                            <option value=""><strong>-- Seleccione una Empresa --</strong></option>
                            @foreach ($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input-group mb-1 col-12 col-md-3 mb-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Del</span>
                            </div>
                            <input type="date" class="form-control" wire:model='inicio'>
                        </div>
                    </div>
                    <div class="input-group mb-1 col-12 col-md-3 mb-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Al</span>
                            </div>
                            <input type="date" class="form-control" wire:model='final'>
                        </div>
                    </div>
                    <div class="col-7 col-md-3 mb-2 ">
                       <select class="form-control form-control-sm" wire:model='user_id'>
                        <option value="">Todos los Operadores</option>
                        @foreach ($usuarios as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                       </select>
                    </div>


                    <div class="col-7 col-md-2 mb-2 ">
                        <div class="d-flex align-items-center" style="font-size: 12px;">
                            <span>Mostrar</span> &nbsp;
                            <select name="filas" id="filas" class="form-control form-control-sm" wire:model='filas'
                                style="font-size: 12px;">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="100">100</option>
                            </select> &nbsp;
                            <span>filas</span>
                        </div>
                    </div>
                    <div class="col-7 col-md-3 mb-2 ">
                        @if ($resultados->count())
                        <button class="btn btn-success btn-sm btn-block" wire:click='exporExcel'>Exportar <i
                                class="fas fa-file-excel"></i></button>
                        @endif
                    </div>
                </div>
                <hr>
                <h3 class="mb-3 text-center">REPORTE DE CONTACTOS</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-nowrap" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th colspan="4"></th>
                                <th colspan="2" class="bg-info text-center">RESULTADO CONTACTO</th>
                                <th class="bg-info text-center" colspan="2">COMPROMISO PAGO</th>
                                <th class="bg-info text-center" colspan="3">RESULTADO DE PAGO</th>
                                <th colspan="5"></th>
                            </tr>
                            <tr class="bg-info">
                                <th>Nro.</th>
                                <th>JEFE DE VENTA</th>
                                <th>CODIGO CLIENTE</th>
                                <th>CLIENTE</th>

                                <th class="text-center">FECHA</th>
                                <th class="text-center">RESULTADO</th>

                                <th class="text-center">FECHA</th>
                                <th class="text-right">MONTO (BS)</th>

                                <th class="text-center">FECHA</th>
                                <th class="text-right">MONTO (BS)</th>
                                <th class="text-center">RESULTADO</th>

                                <th>COMENTARIO</th>
                                <th>RESULTADO DEL CONTACTO</th>
                                <th>RESPALDO FOTOGRAFICO</th>
                                <th>SOLICITUD BBO</th>
                                <th>ACCION BLACK BIRD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resultados as $item)

                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$item->deuda->entnombrejefevendedor}}</td>
                                <td>{{$item->lotedeuda->deuda->deudore->codigocliente}}</td>
                                <td>{{$item->lotedeuda->deuda->cliente}}</td>

                                <td class="text-center">{{$item->fechacontacto}}</td>
                                <td class="text-center">
                                    {{$item->estadocontacto_id?$item->estadocontacto->nombre:'--'}}
                                </td>

                                <td class="text-right">
                                    {{$item->compromisopago_id?substr($item->compromisopago->fechahoracompromiso,0,10):'--'}}
                                </td>
                                <td class="text-right">
                                    {{$item->compromisopago_id?numToFloat($item->compromisopago->montocomprometido):'--'}}
                                </td>


                                <td class="text-center">{{$item->pago_id?substr($item->pago->fechahorapago,0,10):'--'}}
                                </td>
                                <td class="text-right">{{$item->pago_id?numToFloat($item->pago->monto):'--'}}</td>
                                <td class="text-center">{{$item->pago_id?'SI':'NO'}}</td>

                                <td>{{$item->detalles}}</td>
                                <td>
                                    @php
                                    $c=0;
                                    @endphp
                                    @foreach ($item->resultados as $res)

                                    {{++$c.') '.$res->resultado->nombre}} <br>
                                    @endforeach
                                </td>
                                <td></td>
                                <td>{{$item->solicitudempresa}}</td>
                                <td>{{$item->accionpropia}}</td>


                            </tr>

                            @empty
                            <tr>
                                <td colspan="16" class="text-center"><strong>No existen resultados.</strong></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>
