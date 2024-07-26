<?php

namespace App\Http\Livewire;

use App\Models\Deuda;
use App\Models\Empresa;
use App\Models\Lote;
use App\Models\Lotedeuda;
use App\Models\User;
use App\Models\Vwdeudas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class NuevoLote extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $filas = 10, $search = "";
    public $empresa;
    public $selectDeudas = [];
    public $selectIds = [];
    public $usuarios, $selectUser;

    public function mount($empresa_id)
    {
        $this->empresa = Empresa::find($empresa_id);
        $this->usuarios = User::all();
    }

    public function render()
    {
        if (!count($this->selectIds)) {
            if ($this->search == "") {
                $deudas = Vwdeudas::paginate($this->filas);
            } else {
                $deudas = Vwdeudas::where('numdoc', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                    ->paginate($this->filas);
            }
        } else {
            if ($this->search == "") {
                $deudas = Vwdeudas::whereNotIn('id', $this->selectIds)->paginate($this->filas);
            } else {
                $deudas = Vwdeudas::where('numdoc', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                    ->whereNotIn('id', $this->selectIds)->paginate($this->filas);
            }
        }

        return view('livewire.nuevo-lote', compact('deudas'))->extends('adminlte::page');
    }

    public function selectDeuda(Deuda $deuda)
    {
        $this->selectIds[] = $deuda->id;
        $this->selectDeudas[] = $deuda->toArray();
    }

    public function selectAll()
    {
        $deudas = [];
        if (!count($this->selectIds)) {
            if ($this->search == "") {
                $deudas = Vwdeudas::all();
            } else {
                $deudas = Vwdeudas::where('numdoc', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                    ->get();
            }
        } else {
            if ($this->search == "") {
                $deudas = Vwdeudas::whereNotIn('id', $this->selectIds)->get();
            } else {
                $deudas = Vwdeudas::where('numdoc', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                    ->whereNotIn('id', $this->selectIds)->get();
            }
        }
        foreach ($deudas as $item) {
            $this->selectDeudas[] = $item->toArray();
            $this->selectIds[] = $item->id;
        }
    }

    public function quitarDeuda($i)
    {
        unset($this->selectDeudas[$i]);
        $this->selectDeudas = array_values($this->selectDeudas);
        unset($this->selectIds[$i]);
        $this->selectIds = array_values($this->selectIds);
    }

    public function quitarAll()
    {
        $this->reset(['search', 'selectDeudas', 'selectIds']);
    }

    public function updatedFilas()
    {
        $this->resetPage();
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        "selectUser" => "required",
        "selectIds" => "required"
    ];

    public function generarLote()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            $lote = Lote::create([
                "fecha" => date('Y-m-d'),
                "avance" => 0,
                "empresa_id" => $this->empresa->id,
                "user_id" => $this->selectUser,
            ]);

            $lote->codigo = $lote->empresa_id . '-' . str_pad($lote->id, 5, "0", STR_PAD_LEFT);
            $lote->save();

            foreach ($this->selectIds as $id) {
                $lotedeuda = Lotedeuda::create([
                    "lote_id" => $lote->id,
                    "deuda_id" => $id,
                ]);
            }

            DB::commit();
            return redirect()->route('lotes.index')->with('success', 'Lote generado correctamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('error', 'Ha ocurrido un error');
        }
    }
}
