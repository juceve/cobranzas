<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnticuacionesExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $resultados = Session::get('anticuaciones-resultados');
        $anticuaciones = Session::get('anticuaciones');
        return view('excels.anticuaciones', compact('resultados','anticuaciones'))->with('i', 0);
    }
}
