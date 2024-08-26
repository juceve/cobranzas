<?php

namespace App\Http\Livewire;

use App\Models\Deuda;
use App\Models\Empresa;
use App\Models\Vwdeudas;
use Livewire\Component;
use Livewire\WithPagination;

class ManejoDeudas extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empresa_id, $search = "", $filas = 10;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        $empresas = Empresa::all();
        if ($empresas->count()) {
            $this->empresa_id = $empresas->first()->id;
        }
        $resultados = [];
        if ($this->search == "" && $this->empresa_id != "") {
            $resultados = Vwdeudas::where("empresa_id", $this->empresa_id)->orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
        } else {
            if ($this->empresa_id != "") {
                $resultados = Vwdeudas::where([['codigocliente', 'LIKE', '%' . $this->search . '%'], ["empresa_id", $this->empresa_id]])
                    ->orWhere([['cliente', 'LIKE', '%' . $this->search . '%'], ["empresa_id", $this->empresa_id]])
                    ->orWhere([['numdoc', 'LIKE', '%' . $this->search . '%'], ["empresa_id", $this->empresa_id]])
                    ->orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
            }
        }
        return view('livewire.manejo-deudas', compact('resultados', 'empresas'))->with('i', 0)->extends('adminlte::page');
    }




    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatedFilas()
    {
        $this->resetPage();
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
}
