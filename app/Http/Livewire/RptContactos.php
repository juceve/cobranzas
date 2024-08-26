<?php

namespace App\Http\Livewire;

use App\Exports\ContactosExport;
use App\Models\Contacto;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Vwcontactos;
use App\Models\Vwpagos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class RptContactos extends Component
{
    public $empresa_id = "", $user_id = "", $filas = 10, $status = 1;
    public $inicio = "", $final = "", $usuarios;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function mount($empresa_id = NULL)
    {
        $this->inicio = date('Y-m-') . '01';
        $this->final = date('Y-m-d');
        if ($empresa_id) {
            $this->empresa_id = $empresa_id;
        }
        $this->usuarios = User::role('Operador')->get();
    }
    public function render()
    {
        $empresas = Empresa::all();
        if ($empresas->count()) {
            $this->empresa_id = $empresas->first()->id;
        }

        $resultados = Vwcontactos::where('fechacontacto', '>=', $this->inicio)
            ->where('fechacontacto', '<=', $this->final)
            ->where('empresa_id', $this->empresa_id)
            ->orderBy('fechacontacto', 'ASC')
            ->get();

        if ($this->user_id) {
            $resultados = $resultados->where('user_id', $this->user_id);
        }

        Session::put('contactos-resultados', $resultados);
        return view('livewire.rpt-contactos', compact('empresas', 'resultados'))->with('i', 0)->extends('adminlte::page');
    }

    public function exporExcel()
    {
        return Excel::download(new ContactosExport(), 'RptContactos'  . '_' . date('His') . '.xlsx');
    }
}
