<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MisLotes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empresa_id = "", $user_id = "", $filas = 10, $status = 1;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function mount($empresa_id = NULL)
    {
        if ($empresa_id) {
            $this->empresa_id = $empresa_id;
        }
        $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $empresas = Empresa::all();
        if ($empresas->count()) {
            $this->empresa_id = $empresas->first()->id;
        }
        $resultados = [];
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

        return view('livewire.mis-lotes', compact('resultados', 'empresas'))->extends('adminlte::page');
    }
}
