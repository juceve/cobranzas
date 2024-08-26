<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CompromisosExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $resultados = Session::get('contactos-resultados');
        return view('excels.compromisos', compact('resultados'))->with('i', 0);
    }
}
