<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use Livewire\Component;

class UpddbEmpresas extends Component
{
    public $empresa;

    public function mount($empresa_id)
    {
        $this->empresa = Empresa::find($empresa_id);
    }

    public function render()
    {
        return view('livewire.upddb-empresas')->extends('adminlte::page');
    }
}
