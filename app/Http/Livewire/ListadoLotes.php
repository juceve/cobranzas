<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\Lote;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListadoLotes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empresa_id = "", $user_id = "", $filas = 10, $status = 1;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        $users = User::role('Operador')->get();
        $empresas = Empresa::all();
        if ($empresas->count()) {
            $this->empresa_id = $empresas->first()->id;
        }
        $resultados = [];
        if ($this->user_id == "" && $this->empresa_id != "") {
            if ($this->status == "") {
                $resultados = DB::table('lotes')
                    ->join('users', 'users.id', '=', 'lotes.user_id')
                    ->join('empresas', 'empresas.id', '=', 'lotes.empresa_id')
                    ->select('lotes.*', 'users.name AS usuario', 'empresas.nombre AS empresa')
                    ->where("empresa_id", $this->empresa_id)->orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
            } else {
                $resultados = DB::table('lotes')
                    ->join('users', 'users.id', '=', 'lotes.user_id')
                    ->join('empresas', 'empresas.id', '=', 'lotes.empresa_id')
                    ->select('lotes.*', 'users.name AS usuario', 'empresas.nombre AS empresa')
                    ->where([["empresa_id", $this->empresa_id], ['lotes.status', $this->status]])->orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
            }
        } else {
            if ($this->empresa_id != "") {
                if ($this->status == "") {
                    $resultados = DB::table('lotes')
                        ->join('users', 'users.id', '=', 'lotes.user_id')
                        ->join('empresas', 'empresas.id', '=', 'lotes.empresa_id')
                        ->select('lotes.*', 'users.name AS usuario', 'empresas.nombre AS empresa')
                        ->where([["empresa_id", $this->empresa_id], ['user_id', $this->user_id]])->orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
                } else {
                    $resultados = DB::table('lotes')
                        ->join('users', 'users.id', '=', 'lotes.user_id')
                        ->join('empresas', 'empresas.id', '=', 'lotes.empresa_id')
                        ->select('lotes.*', 'users.name AS usuario', 'empresas.nombre AS empresa')
                        ->where([["empresa_id", $this->empresa_id], ['lotes.status', $this->status], ['user_id', $this->user_id]])->orderBy($this->sortField, $this->sortDirection)->paginate($this->filas);
                }
            }
        }
        return view('livewire.listado-lotes', compact('resultados', 'empresas', 'users'))->with('i', 0);
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
