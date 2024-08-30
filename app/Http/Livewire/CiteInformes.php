<?php

namespace App\Http\Livewire;

use App\Models\Citeinforme;
use App\Models\Empresa;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class CiteInformes extends Component
{
    public $empresa_id, $empresa = NULL;

    public function mount($empresa_id = NULL)
    {
        if ($empresa_id) {
            $this->empresa_id = $empresa_id;
        }

        if (session()->has('successprint')) {
            $this->emit('success', 'Informe generado correctamente.');
            $this->generatePDF(session('successprint'));
        }
    }

    public function render()
    {
        $empresas = Empresa::all();
        if ($this->empresa_id != "") {
            $this->empresa = Empresa::find($this->empresa_id);
        } else {
            $this->empresa = $empresas->first();
            $this->empresa_id = $this->empresa->id;
        }

        $this->emit('datatable');

        return view('livewire.cite-informes', compact('empresas'))->extends('adminlte::page');
    }

    public function generatePDF($citeinforme_id)
    {
        $citeinforme = Citeinforme::find($citeinforme_id);

        $pdf = Pdf::loadView('pdf.cite-informe', compact('citeinforme'))
            ->setPaper('letter', 'portrait');

        return $pdf->stream();
    }
}
