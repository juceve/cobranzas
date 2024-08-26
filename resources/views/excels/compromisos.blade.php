<table>
    <tr>
        <td colspan="12" align="center"><strong>COMPROMISOS DE PAGO</strong></td>
    </tr>
    <tr>
        <td colspan="12" align="center"></td>
    </tr>
    <thead>
        <tr>
            <th colspan="4"></th>
            <th>CONTACTO</th>
            <th colspan="2">COMPROMISO PAGO</th>
            <th colspan="5">RESULTADO DE PAGO</th>
        </tr>
        <tr>
            <th>Nro.</th>
            <th>COBRADOR BLACK BIRD</th>
            <th>CODIGO CLIENTE</th>
            <th>CLIENTE</th>
            <th class="text-center">FECHA</th>
            <th class="text-center">FECHA</th>
            <th class="text-right">MONTO (BS)</th>
            <th>COBRADOR</th>
            <th class="text-center">FECHA</th>
            <th class="text-right">MONTO (BS)</th>
            <th>RESULTADO</th>
            <th>METODO PAGO</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($resultados as $item)
        @if ($item->compromisopago_id)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$item->pago?$item->pago->user->name:'--'}}</td>
            <td>{{$item->lotedeuda->deuda->deudore->codigocliente}}</td>
            <td>{{$item->lotedeuda->deuda->cliente}}</td>
            <td class="text-center">{{$item->fechacontacto}}</td>
            <td class="text-center">
                {{$item->compromisopago_id?substr($item->compromisopago->fechahoracompromiso,0,10):'--'}}
            </td>
            <td class="text-right">
                {{$item->compromisopago_id?numToFloat($item->compromisopago->montocomprometido):'--'}}
            </td>
            <td>{{$item->pago_id?$item->pago->ncobrador:'--'}}</td>
            <td class="text-center">{{$item->pago_id?substr($item->pago->fechahorapago,0,10):'--'}}
            </td>
            <td class="text-right">{{$item->pago_id?numToFloat($item->pago->monto):'--'}}</td>
            <td>{{$item->pago_id?'SI':'--'}}</td>
            <td>{{$item->pago_id?$item->pago->metodopago->nombre:'--'}}</td>
        </tr>
        @endif

        @empty
        <tr>
            <td colspan="12" class="text-center"><strong>No existen resultados.</strong></td>
        </tr>
        @endforelse
    </tbody>
</table>