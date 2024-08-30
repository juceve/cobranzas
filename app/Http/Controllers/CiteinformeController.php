<?php

namespace App\Http\Controllers;

use App\Models\Citeinforme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CiteinformeRequest;
use App\Models\Vwcontactos;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CiteinformeController extends Controller
{
    public function pdf($citeinforme_id)
    {
        $citeinforme = Citeinforme::find($citeinforme_id);

        // $urlchart = route('chartciteinforme',$citeinforme_id);
        // return view('pdf.cite-informe', compact('citeinforme'));


        $pdf = Pdf::loadView('pdf.cite-informe', compact('citeinforme'))
            ->setPaper('letter', 'portrait');

        return $pdf->stream();
    }

    public function showChart($citeinforme_id)
    {
        $citeinforme = Citeinforme::find($citeinforme_id);
        Session::put('citeinforme-resultados', $citeinforme);
        return view('pdf.chartciteinforme');
    }

    public function generatePDF(Request $request)
    {
        $chartImage = $request->input('chartImage');
        $citeinforme = Session::get('citeinforme-resultados');
        // Genera el PDF con la vista y la imagen del gráfico
        $contactos =  DB::select("SELECT ec.nombre estado, COUNT(*) cantidad FROM vwcontactos c INNER JOIN estadocontactos ec ON ec.id = c.estadocontacto_id WHERE c.fechacontacto >= '" . $citeinforme->fechainicial . "' AND c.fechacontacto <= '" . $citeinforme->fechafinal . "' GROUP BY estado");
        $pdf = PDF::loadView('pdf.grf-cite-informe', compact('chartImage', 'citeinforme', 'contactos'))->setPaper('letter', 'portrait');;

        return $pdf->stream('GRAFICO ID-' . $citeinforme->id . '.pdf');
    }

    public function dataContactos()
    {
        $citeinforme = Session::get('citeinforme-resultados');

        $contactos =  DB::select("SELECT ec.nombre estado, COUNT(*) cantidad FROM vwcontactos c INNER JOIN estadocontactos ec ON ec.id = c.estadocontacto_id WHERE c.fechacontacto >= '" . $citeinforme->fechainicial . "' AND c.fechacontacto <= '" . $citeinforme->fechafinal . "' GROUP BY estado");

        $estados = [];
        $porcentajes = [];
        $cantidades = [];
        $totalcontactos = 0;
        foreach ($contactos as $item) {
            $totalcontactos += $item->cantidad;
        }

        foreach ($contactos as $item) {
            $estados[] = $item->estado . ' - ' . numToFloat(($item->cantidad * 100) / $totalcontactos) . '%';
            $porcentajes[] = numToFloat(($item->cantidad * 100) / $totalcontactos);
            $cantidades[] = $item->cantidad;
        }

        return response()->json([
            'estados' => $estados,
            'cantidades' => $cantidades,
            'porcentajes' => $porcentajes
        ]);
    }
}
