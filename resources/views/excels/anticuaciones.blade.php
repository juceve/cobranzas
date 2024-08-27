<table>
    <tr>
        <td colspan="{{ count($anticuaciones) + 7 }}" align="center"><strong>REPORTE ANTICUACIONES</strong></td>
    </tr>
    <tr>
        <td colspan="{{ count($anticuaciones) + 7 }}" align="center"></td>
    </tr>
    <thead>
        <tr>
            <th colspan="7"></th>
            <th colspan="{{ count($anticuaciones) }}" align="center"><strong>ANTICUACIÓN</strong></th>
        </tr>
        <tr>
            <th align="center"><strong>Nro.</strong></th>
            <th align="center"><strong>COD. CLIENTE</strong></th>
            <th align="center"><strong>CLIENTE</strong></th>
            <th align="center"><strong>TOTAL LIMITE DE CREDITO <br> (BS)</strong></th>
            <th align="center"><strong>TOTAL IMPORTE DE CREDITO <br> (BS)</strong></th>
            <th align="center"><strong>TOTAL CANCELADO <br> (BS)</strong></th>
            <th align="center"><strong>TOTAL SALDO <br> (BS)</strong></th>
            @foreach ($anticuaciones as $item)
                <th align="center"><strong>{{ $item->anticuacion }}</strong></th>
            @endforeach

        </tr>
    </thead>
    <tbody>
        @forelse ($resultados as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->codigocliente }}</td>
                <td>{{ $item->cliente }}</td>
                <td align="right">{{ numToFloat($item->limitecredito) }}</td>
                <td align="right">{{ numToFloat($item->totalimporte) }}</td>
                <td align="right">{{ numToFloat($item->totalcancelado) }}</td>
                <td align="right">{{ numToFloat($item->totalsaldo) }}</td>
                @foreach ($anticuaciones as $ant_item)
                    <td align="right">
                        @if ($ant_item->anticuacion == $item->anticuacion)
                            {{ numToFloat($item->totalsaldo) }}
                        @endif
                    </td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($anticuaciones) + 7 }}" class="text-center"><strong>No existen
                        resultados.</strong></td>
            </tr>
        @endforelse
    </tbody>
</table>
