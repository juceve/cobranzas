<?php

namespace App\Http\Livewire;

use App\Models\Contacto;
use App\Models\Deuda;
use App\Models\Estadocontacto;
use App\Models\Gestiontipo;
use App\Models\Lotedeuda;
use App\Models\Zona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProcesoDeuda extends Component
{
    public $lotedeuda, $deuda, $contacto = [], $compromiso = [], $currentContacto, $currentID = 0;
    public $zonas, $gestiontipos, $estadocontactos, $historialContactos;

    public $gestiontipo_id = "", $nombrecontacto = "", $zona_id = "", $detalles = "", $proxcontacto = "", $estadocontacto_id = "", $resultado = "", $solicitudempresa = "", $accionpropia = "", $urlfoto = "";
    public $telffijo = "", $telfcelular = "", $telfref1 = "";
    public $fechahoracobro = "";

    public function mount($lotedeuda_id)
    {
        $this->gestiontipos = Gestiontipo::all();
        $this->zonas = Zona::all();
        $this->lotedeuda = Lotedeuda::find($lotedeuda_id);
        $this->estadocontactos = Estadocontacto::all();
        $this->deuda = $this->lotedeuda->deuda;
        $this->historialContactos = Contacto::where('lotedeuda_id', $this->lotedeuda->id)->get();

        $this->telffijo = $this->lotedeuda->deuda->deudore->telffijo;
        $this->telfcelular = $this->lotedeuda->deuda->deudore->telfcelular;
        $this->telfref1 = $this->lotedeuda->deuda->deudore->telfref1;

        $this->nombrecontacto = $this->lotedeuda->deuda->cliente;

        $this->zona_id = $this->lotedeuda->deuda->zona_id;

        // $this->proxcontacto = $this->lotedeuda->proxcontacto;
        // $this->fechahoracobro = $this->lotedeuda->fechahoracobro;

        // SI EXISTE UN CONTACTO NO FINALIZADO LO CARGA
        foreach ($this->historialContactos as $contacto) {
            if ($contacto->status == 1) {

                $this->currentID = $contacto->id;
                $this->currentContacto = $contacto;
                $this->gestiontipo_id = $this->currentContacto->gestiontipo_id;
                $this->estadocontacto_id = $this->currentContacto->estadocontacto_id;
                $this->detalles = $this->currentContacto->detalles;
                $this->resultado = $this->currentContacto->resultado;
                $this->solicitudempresa = $this->currentContacto->solicitudempresa;
                $this->accionpropia = $this->currentContacto->accionpropia;
                $this->urlfoto = $this->currentContacto->urlfoto;
                $this->nombrecontacto = $this->currentContacto->nombrecontacto;
            }
        }
    }
    public function render()
    {
        return view('livewire.proceso-deuda')->extends('adminlte::page');
    }

    protected $listeners = ['guardar'];

    protected $rules = [
        "estadocontacto_id" => "required",
        "gestiontipo_id" => "required",
        "nombrecontacto" => "required",
        "detalles" => "required",
        "resultado" => "required",
    ];

    public function guardar($finalizar)
    {
        $this->validate();

        if ($this->currentID != 0) {
            $this->currentContacto->estadocontacto_id = $this->estadocontacto_id;
            $this->currentContacto->gestiontipo_id = $this->gestiontipo_id;
            $this->currentContacto->fechacontacto = date('Y-m-d');
            $this->currentContacto->horacontacto = date('H:i:s');
            $this->currentContacto->nombrecontacto = $this->nombrecontacto;
            //$thiscurrentContacto->->proxcontacto= $this->proxcontacto;
            $this->currentContacto->detalles = $this->detalles;
            $this->currentContacto->resultado = $this->resultado;
            $this->currentContacto->solicitudempresa = $this->solicitudempresa;
            $this->currentContacto->accionpropia = $this->accionpropia;
            $this->currentContacto->urlfoto = $this->urlfoto;
            $this->currentContacto->user_id = Auth::user()->id;
            $this->currentContacto->save();
        } else {
            $contacto = Contacto::create([
                'lotedeuda_id' => $this->lotedeuda->id,
                'estadocontacto_id' => $this->estadocontacto_id,
                'gestiontipo_id' => $this->gestiontipo_id,
                'fechacontacto' => date('Y-m-d'),
                'horacontacto' => date('H:i:s'),
                'nombrecontacto' => $this->nombrecontacto,
                // 'proxcontacto' => $this->proxcontacto,
                'detalles' => $this->detalles,
                'resultado' => $this->resultado,
                'solicitudempresa' => $this->solicitudempresa,
                'accionpropia' => $this->accionpropia,
                'urlfoto' => $this->urlfoto,
                'user_id' => Auth::user()->id,
            ]);
            $this->currentContacto = $contacto;
        }

        $deudore = $this->lotedeuda->deuda->deudore;
        $deudore->telffijo = $this->telffijo;
        $deudore->telfcelular = $this->telfcelular;
        $deudore->telfref1 = $this->telfref1;
        $deudore->save();

        $deuda = $this->lotedeuda->deuda;
        if ($this->zona_id) {
            $deuda->zona_id = $this->zona_id;
            $deuda->save();
        }

        if ($finalizar) {
            $this->currentContacto->status = false;
            $this->currentContacto->save();
        }



        return redirect()->route('procesodeuda', $this->lotedeuda->id)->with('success', 'Cambios registrados correctamente.');
        // DB::beginTransaction();
        // try {

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }
    }
}
