<?php

namespace App\Http\Livewire;

use App\Models\Deuda;
use App\Models\Empresa;
use App\Models\Lote;
use App\Models\Lotedeuda;
use App\Models\User;
use App\Models\Vwdeudas;
use App\Models\Vwdeudaslotes;
use App\Models\Zona;
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
    public $zonas, $zona_id = "";
    public $isProcessing = false;

    public function mount($empresa_id)
    {
        $this->empresa = Empresa::find($empresa_id);
        $this->usuarios = User::role('Operador')->get();
        $this->zonas = Zona::all();
    }

    public function render()
    {
        if (!count($this->selectIds)) {
            if ($this->search == "") {
                if ($this->zona_id == "") {
                    $deudas = Vwdeudaslotes::orderBy('cliente', 'ASC')->paginate($this->filas);
                } else {
                    $deudas = Vwdeudaslotes::where('zona_id', $this->zona_id)->orderBy('cliente', 'ASC')->paginate($this->filas);
                }
            } else {
                if ($this->zona_id != "") {
                    $deudas = Vwdeudaslotes::where([['numdoc', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->orWhere([['cliente', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->orderBy('cliente', 'ASC')
                        ->paginate($this->filas);
                } else {
                    $deudas = Vwdeudaslotes::where('numdoc', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                        ->orderBy('cliente', 'ASC')
                        ->paginate($this->filas);
                }
            }
        } else {
            if ($this->search == "") {
                if ($this->zona_id == "") {
                    $deudas = Vwdeudaslotes::whereNotIn('id', $this->selectIds)->orderBy('cliente', 'ASC')->paginate($this->filas);
                } else {
                    $deudas = Vwdeudaslotes::where('zona_id', $this->zona_id)->whereNotIn('id', $this->selectIds)->orderBy('cliente', 'ASC')->paginate($this->filas);
                }
            } else {
                if ($this->zona_id == "") {
                    $deudas = Vwdeudaslotes::where('numdoc', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                        ->whereNotIn('id', $this->selectIds)->orderBy('cliente', 'ASC')
                        ->paginate($this->filas);
                } else {
                    $deudas = Vwdeudaslotes::where([['numdoc', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->orWhere([['cliente', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->whereNotIn('id', $this->selectIds)->orderBy('cliente', 'ASC')
                        ->paginate($this->filas);
                }
            }
        }

        return view('livewire.nuevo-lote', compact('deudas'))->with('i', 0)->extends('adminlte::page');
    }

    public function selectDeuda(Deuda $deuda)
    {
        $this->isProcessing = true;
        $this->selectIds[] = $deuda->id;
        $this->selectDeudas[] = $deuda->toArray();
        $this->isProcessing = false;
    }

    public function selectItems($cantidad = 0)
    {
        $this->isProcessing = true;


        $deudas = [];

        if (!count($this->selectIds)) {
            if ($this->search == "") {
                if ($this->zona_id == "") {
                    $deudas = Vwdeudaslotes::all();
                } else {
                    $deudas = Vwdeudaslotes::where('zona_id', $this->zona_id)->get();
                }
            } else {
                if ($this->zona_id != "") {
                    $deudas = Vwdeudaslotes::where([['numdoc', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->orWhere([['cliente', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->get();
                } else {
                    $deudas = Vwdeudaslotes::where('numdoc', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                        ->get();
                }
            }
        } else {
            if ($this->search == "") {
                if ($this->zona_id == "") {
                    $deudas = Vwdeudaslotes::whereNotIn('id', $this->selectIds)->get();
                } else {
                    $deudas = Vwdeudaslotes::where('zona_id', $this->zona_id)->whereNotIn('id', $this->selectIds)->get();
                }
            } else {
                if ($this->zona_id == "") {
                    $deudas = Vwdeudaslotes::where('numdoc', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('cliente', 'LIKE', '%' . $this->search . '%')
                        ->whereNotIn('id', $this->selectIds)
                        ->get();
                } else {
                    $deudas = Vwdeudaslotes::where([['numdoc', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->orWhere([['cliente', 'LIKE', '%' . $this->search . '%'], ['zona_id', $this->zona_id]])
                        ->whereNotIn('id', $this->selectIds)
                        ->get();
                }
            }
        }
        if ($cantidad > 0) {
            foreach ($deudas->take($cantidad) as $item) {
                $this->selectDeudas[] = $item->toArray();
                $this->selectIds[] = $item->id;
            }
        } else {
            foreach ($deudas as $item) {
                $this->selectDeudas[] = $item->toArray();
                $this->selectIds[] = $item->id;
            }
        }

        $this->isProcessing = false;
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
    public function updatedZonaId()
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
