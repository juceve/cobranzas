<table>
    <tr>
        <td colspan="16" align="center"><strong>COMPROMISOS DE PAGO</strong></td>
    </tr>
    <tr>
        <td colspan="16" align="center"></td>
    </tr>
    <thead>
        <tr>
            <th colspan="4"></th>
            <th colspan="2">RESULTADO CONTACTO</th>
            <th colspan="2">COMPROMISO PAGO</th>
            <th colspan="3">RESULTADO DE PAGO</th>
            <th colspan="5"></th>
        </tr>
        <tr>
            <th>Nro.</th>
            <th>JEFE DE VENTA</th>
            <th>CODIGO CLIENTE</th>
            <th>CLIENTE</th>

            <th>FECHA</th>
            <th>RESULTADO</th>

            <th>FECHA</th>
            <th>MONTO (BS)</th>

            <th>FECHA</th>
            <th>MONTO (BS)</th>
            <th>RESULTADO</th>

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

            <td>{{$item->fechacontacto}}</td>
            <td>
                {{$item->estadocontacto_id?$item->estadocontacto->nombre:'--'}}
            </td>

            <td>
                {{$item->compromisopago_id?substr($item->compromisopago->fechahoracompromiso,0,10):'--'}}
            </td>
            <td>
                {{$item->compromisopago_id?numToFloat($item->compromisopago->montocomprometido):'--'}}
            </td>


            <td>{{$item->pago_id?substr($item->pago->fechahorapago,0,10):'--'}}
            </td>
            <td>{{$item->pago_id?numToFloat($item->pago->monto):'--'}}</td>
            <td>{{$item->pago_id?'SI':'--'}}</td>

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
            <td colspan="12"><strong>No existen resultados.</strong></td>
        </tr>
        @endforelse
    </tbody>
</table>