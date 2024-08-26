<div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm" style="font-size: 12px;">
            <thead>
                <tr class="table-info">
                    <th>FECHA HORA ACTUALIZACIÓN</th>
                    <th>SALDO</th>
                    <th>MONTO ABONADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($deuda->movimientos as $item)
                <tr>
                    <td class="align-middle">{{$item->created_at}}</td>
                    <td class="align-middle">{{number_format($item->saldonuevo,2,'.')}}</td>
                    <td class="align-middle">
                        @if ($item->saldoanterior==0)
                        0
                        @else
                        {{number_format($item->saldoanterior-$item->saldonuevo,2,'.')}}
                        @endif
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-sm btn-outline-info" title="Mas Detalles"
                            wire:click='viewMovimiento({{$item->id}})' data-toggle="modal"
                            data-target="#modalMovimiento">
                            <i class="fas fa-search"></i>
                        </button>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMovimiento" tabindex="-1" aria-labelledby="modalMovimientoLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMovimientoLabel">Detalle de Movimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($movimiento)
                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>FECHA MOVIMIENTO</strong></td>
                                <td class="text-right">{{$movimiento->created_at}}</td>
                            </tr>
                            <tr>
                                <td><strong>SALDO ANTERIO</strong></td>
                                <td class="text-right">{{number_format($movimiento->saldoanterior,2,'.')}}</td>
                            </tr>
                            <tr>
                                <td><strong>SALDO NUEVO</strong></td>
                                <td class="text-right">{{number_format($movimiento->saldonuevo,2,'.')}}</td>
                            </tr>
                            <tr>
                                <td><strong>MONTO ABONADO</strong></td>
                                <td class="text-right">
                                    @if ($movimiento->saldoanterior==0)
                                    0
                                    @else
                                    {{number_format(($movimiento->saldoanterior-$movimiento->saldonuevo),2,'.')}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>ULT. PAGO ANTERIOR</strong></td>
                                <td class="text-right">{{$movimiento->fecultpagoanterior}}</td>
                            </tr>
                            <tr>
                                <td><strong>ULT. PAGO NUEVO</strong></td>
                                <td class="text-right">{{$movimiento->fecultpagonuevo}}</td>
                            </tr>
                            <tr>
                                <td><strong>RANGO ANTERIOR</strong></td>
                                <td class="text-right">{{$movimiento->rangoanterior}}</td>
                            </tr>
                            <tr>
                                <td><strong>RANGO NUEVO</strong></td>
                                <td class="text-right">{{$movimiento->rangonuevo}}</td>
                            </tr>
                            <tr>
                                <td><strong>OBSERVACIONES</strong></td>
                                <td class="text-right">{{$movimiento->observaciones}}</td>
                            </tr>

                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
            </div>
        </div>
    </div>
</div>