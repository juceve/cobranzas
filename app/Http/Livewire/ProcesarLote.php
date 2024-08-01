<?php

namespace App\Http\Livewire;

use App\Models\Deuda;
use App\Models\Gestiontipo;
use App\Models\Lote;
use App\Models\Lotedeuda;
use App\Models\Zona;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProcesarLote extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filas = 10, $status = 1;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $lote, $lotedeuda;
    public $zonas, $gestiontipos;

    public function mount($lote_id)
    {
        $this->lote = Lote::find($lote_id);
        $this->zonas = Zona::all();
        $this->gestiontipos = Gestiontipo::all();
    }

    public function render()
    {
        $lotedeudas = Lotedeuda::where('lote_id', $this->lote->id)->get();
        return view('livewire.procesar-lote', compact('lotedeudas'))->extends('adminlte::page');
    }


    // public $gestiontipo_id = "", $nombrecontacto = "", $zona_id = "", $detalles = "", $proxcontacto = "", $fechahoracobro = "", $contactado;
    // public $telffijo = "", $telfcelular = "", $telfref1 = "";

    // public function loadDeuda($id)
    // {
    //     $this->reset(['gestiontipo_id', 'lotedeuda', 'nombrecontacto', 'zona_id', 'detalles', 'proxcontacto', 'fechahoracobro', 'contactado', 'telffijo', 'telfcelular', 'telfref1']);

    //     $this->lotedeuda = Lotedeuda::find($id);
    //     $this->nombrecontacto = $this->lotedeuda->deuda->cliente;
    //     $this->contactado = $this->lotedeuda->contactado;
    //     $this->gestiontipo_id = $this->lotedeuda->gestiontipo_id;
    //     $this->zona_id = $this->lotedeuda->deuda->zona_id;
    //     $this->detalles = $this->lotedeuda->detalles;
    //     $this->proxcontacto = $this->lotedeuda->proxcontacto;
    //     $this->fechahoracobro = $this->lotedeuda->fechahoracobro;

    //     $this->telffijo = $this->lotedeuda->deuda->deudore->telffijo;
    //     $this->telfcelular = $this->lotedeuda->deuda->deudore->telfcelular;
    //     $this->telfref1 = $this->lotedeuda->deuda->deudore->telfref1;
    // }

    // protected $rules = [
    //     "gestiontipo_id" => "required",
    //     "nombrecontacto" => "required",
    //     "detalles" => "required",
    // ];

    // public function guardar($finalizar)
    // {
    //     $this->validate();

    //     DB::beginTransaction();

    //     try {

    //         $deudore = $this->lotedeuda->deuda->deudore;
    //         $deudore->telffijo = $this->telffijo;
    //         $deudore->telfcelular = $this->telfcelular;
    //         $deudore->telfref1 = $this->telfref1;
    //         $deudore->save();

    //         $deuda = $this->lotedeuda->deuda;
    //         if ($this->zona_id) {
    //             $deuda->zona_id = $this->zona_id;
    //             $deuda->save();
    //         }

    //         $this->lotedeuda->gestiontipo_id = $this->gestiontipo_id;
    //         $this->lotedeuda->nombrecontacto = $this->nombrecontacto;
    //         $this->lotedeuda->detalles = $this->detalles;

    //         if ($this->proxcontacto) {
    //             $this->lotedeuda->proxcontacto = $this->proxcontacto;
    //         }

    //         if ($this->fechahoracobro) {
    //             $this->lotedeuda->fechahoracobro = $this->fechahoracobro;
    //         }

    //         $this->lotedeuda->fechacontacto = date('Y-m-d');
    //         $this->lotedeuda->horacontacto = date('H:i:s');
    //         $this->lotedeuda->contactado = $this->contactado;
    //         $this->lotedeuda->save();

    //         if ($finalizar) {
    //             $this->lotedeuda->finalizado = true;
    //             $this->lotedeuda->save();

    //             $canttotal = $this->lotedeuda->where('lote_id', $this->lote->id)->count();

    //             $cantfinalizados = $this->lotedeuda->where('lote_id', $this->lote->id)->where('finalizado', 1)->count();
    //             $avance = ($cantfinalizados * 100) / $canttotal;

    //             $this->lote->avance = $avance;
    //             if ($avance == 100) {
    //                 $this->lote->status = 0;
    //             }
    //             $this->lote->save();
    //         }

    //         DB::commit();
    //         $this->emit('cerrarmodal');
    //         $this->emit('success', 'Registrado correctamente.');
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         $this->emit('error', $th->getMessage());
    //     }
    // }
}
