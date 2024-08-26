<?php

namespace App\Http\Livewire\Tablas;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TablaUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = "", $filas = 5;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        if ($this->search == "") {
            $resultados = User::orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
        } else {
            $resultados = User::where('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
        }
        return view('livewire.tablas.tabla-users', compact('resultados'));
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
