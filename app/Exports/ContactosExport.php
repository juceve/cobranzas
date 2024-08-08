<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContactosExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $resultados = Session::get('contactos-resultados');
        return view('excels.contactos', compact('resultados'))->with('i', 0);
    }
}
