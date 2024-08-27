<?php

namespace App\Http\Livewire;

use App\Exports\AnticuacionesExport;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class RptAnticuacion extends Component
{
    public $empresa_id = "", $user_id = "", $filas = 10, $status = 1;

    public function mount($empresa_id = NULL)
    {

        if ($empresa_id) {
            $this->empresa_id = $empresa_id;
        }
    }

    public function render()
    {
        $empresas = Empresa::all();
        if ($empresas->count()) {
            $this->empresa_id = $empresas->first()->id;
        }
        $anticuaciones = DB::select("SELECT anticuacion, COUNT(*) cantidad FROM deudas GROUP BY anticuacion ORDER BY anticuacion ASC");

        $resultados = DB::select("SELECT de.codigocliente, d.cliente, limitecredito, SUM(importe) totalimporte,SUM((importe - saldo)) totalcancelado, SUM(saldo) totalsaldo,anticuacion FROM deudas d
INNER JOIN deudores de ON de.id=d.deudore_id
GROUP BY de.codigocliente, d.cliente,limitecredito,anticuacion");

        Session::put('anticuaciones-resultados', $resultados);
        Session::put('anticuaciones', $anticuaciones);
        return view('livewire.rpt-anticuacion', compact('empresas', 'resultados', 'anticuaciones'))->with('i', 0)->extends('adminlte::page');
    }

    public function exporExcel()
    {
        return Excel::download(new AnticuacionesExport(), 'RptAnticuaciones'  . '_' . date('His') . '.xlsx');
    }
}
