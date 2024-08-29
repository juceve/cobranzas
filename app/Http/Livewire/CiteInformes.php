<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use Livewire\Component;

class CiteInformes extends Component
{
    public $empresa_id, $empresa;

    public function mount($empresa_id = NULL)
    {
        if ($empresa_id) {
            $this->empresa_id = $empresa_id;
        }
    }

    public function render()
    {
        $empresas = Empresa::all();
        if ($this->empresa_id != "") {
            $this->empresa = Empresa::find($this->empresa_id);
        }
        return view('livewire.cite-informes', compact('empresas'))->extends('adminlte::page');
    }
}
