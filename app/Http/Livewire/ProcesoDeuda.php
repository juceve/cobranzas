<?php

namespace App\Http\Livewire;

use App\Models\Compromisopago;
use App\Models\Contacto;
use App\Models\Deuda;
use App\Models\Estadocontacto;
use App\Models\Gestiontipo;
use App\Models\Lotedeuda;
use App\Models\Recordatorio;
use App\Models\Resultado;
use App\Models\Resultadocontacto;
use App\Models\Resultcontacto;
use App\Models\Zona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProcesoDeuda extends Component
{
    public $lotedeuda, $deuda, $contacto = [], $compromiso = [], $currentContacto, $currentID = 0;
    public $zonas, $gestiontipos, $estadocontactos, $historialContactos;

    public $gestiontipo_id = "", $nombrecontacto = "", $zona_id = "", $detalles = "", $proxcontacto = "", $estadocontacto_id = "", $resultado = [], $solicitudempresa = "", $accionpropia = "", $urlfoto = "", $direccioninterna = "";
    public $telffijo = "", $telfcelular = "", $telfref1 = "", $telfref2 = "", $telfref3 = "";
    public $fechahoracompromiso = "", $montocomprometido = "0", $anotaciones = "";

    public $enableproxcontacto = false, $enablecompromiso = false;

    public $resultcontactos = [], $deudas;

    public function mount($lotedeuda_id)
    {
        $this->gestiontipos = Gestiontipo::all();
        $this->zonas = Zona::all();
        $this->lotedeuda = Lotedeuda::find($lotedeuda_id);
        $this->estadocontactos = Estadocontacto::all();
        $this->deuda = $this->lotedeuda->deuda;
        $this->historialContactos = Contacto::where('lotedeuda_id', $this->lotedeuda->id)->get();

        // $this->telffijo = $this->lotedeuda->deuda->deudore->telffijo;
        // $this->telfcelular = $this->lotedeuda->deuda->deudore->telfcelular;
        // $this->telfref1 = $this->lotedeuda->deuda->deudore->telfref1;
        // $this->telfref2 = $this->lotedeuda->deuda->deudore->telfref2;
        // $this->telfref3 = $this->lotedeuda->deuda->deudore->telfref3;

        $deudore = $this->lotedeuda->deuda->deudore;
        $this->deudas = $deudore->deudas;

        $this->nombrecontacto = $this->lotedeuda->deuda->cliente;

        $this->zona_id = $this->lotedeuda->deuda->zona_id;
        $this->direccioninterna = $this->lotedeuda->deuda->direccioninterna;

        $this->resultcontactos = Resultado::all();

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
                $this->resultado = $this->currentContacto->resultados->toArray();
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

    protected function rules()
    {
        if ($this->enablecompromiso && $this->enableproxcontacto) {
            return  [
                "estadocontacto_id" => "required",
                "gestiontipo_id" => "required",
                "nombrecontacto" => "required",
                "detalles" => "required",
                "resultado" => "required",
                "proxcontacto" => "required",
                "fechahoracompromiso" => "required",
            ];
        }
        if ($this->enablecompromiso == false && $this->enableproxcontacto == true) {
            return  [
                "estadocontacto_id" => "required",
                "gestiontipo_id" => "required",
                "nombrecontacto" => "required",
                "detalles" => "required",
                "resultado" => "required",
                "proxcontacto" => "required",
            ];
        }
        if ($this->enablecompromiso == true && $this->enableproxcontacto == false) {
            return  [
                "estadocontacto_id" => "required",
                "gestiontipo_id" => "required",
                "nombrecontacto" => "required",
                "detalles" => "required",
                "resultado" => "required",
                "fechahoracompromiso" => "required",
            ];
        }
        if (!$this->enablecompromiso && !$this->enableproxcontacto) {
            return  [
                "estadocontacto_id" => "required",
                "gestiontipo_id" => "required",
                "nombrecontacto" => "required",
                "detalles" => "required",
                "resultado" => "required",
            ];
        }
    }

    public function guardar($finalizar)
    {
        $this->validate();


        DB::beginTransaction();
        try {
            if ($this->currentID != 0) {
                $this->currentContacto->estadocontacto_id = $this->estadocontacto_id;
                $this->currentContacto->gestiontipo_id = $this->gestiontipo_id;
                $this->currentContacto->fechacontacto = date('Y-m-d');
                $this->currentContacto->horacontacto = date('H:i:s');
                $this->currentContacto->nombrecontacto = $this->nombrecontacto;
                //$thiscurrentContacto->->proxcontacto= $this->proxcontacto;
                $this->currentContacto->detalles = $this->detalles;
                // $this->currentContacto->resultado = $this->resultado;
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
                    // 'resultado' => implode("|", $this->resultado),
                    'solicitudempresa' => $this->solicitudempresa,
                    'accionpropia' => $this->accionpropia,
                    'urlfoto' => $this->urlfoto,
                    'user_id' => Auth::user()->id,
                ]);
                foreach ($this->resultado as $item) {
                    $resultadocontacto = Resultadocontacto::create([
                        'contacto_id' => $contacto->id,
                        'resultado_id' => $item,
                    ]);
                }

                $this->currentContacto = $contacto;
            }

            $deudore = $this->lotedeuda->deuda->deudore;
            // $deudore->telffijo = $this->telffijo;
            // $deudore->telfcelular = $this->telfcelular;
            // $deudore->telfref1 = $this->telfref1;
            // $deudore->telfref2 = $this->telfref2;
            // $deudore->telfref3 = $this->telfref3;
            // $deudore->save();

            $deuda = $this->lotedeuda->deuda;
            if ($this->zona_id) {
                $deuda->zona_id = $this->zona_id;
                $deuda->direccioninterna = $this->direccioninterna;
                $deuda->save();
            }

            if ($finalizar) {
                $this->currentContacto->status = false;
                $this->currentContacto->save();
            }

            if ($this->enableproxcontacto) {

                $recordatorio = Recordatorio::create([
                    "titulo" => "Contactar " . $deudore->cliente,
                    "cuerpo" => "Cliente: " . $deudore->cliente . " - Num. Doc.: " . $this->lotedeuda->deuda->numdoc,
                    "fecha" => $this->proxcontacto,
                    "user_id" => Auth::user()->id,
                    "model" => Lotedeuda::class,
                    "modelid" => $this->lotedeuda->id,
                ]);
            }

            if ($this->enablecompromiso) {

                $compromiso = Compromisopago::create([
                    "fechahoracompromiso" => $this->fechahoracompromiso,
                    "montocomprometido" => $this->montocomprometido,
                    "anotaciones" => $this->anotaciones,
                    "contacto_id" => $this->currentContacto->id,
                    "user_id" => Auth::user()->id,
                ]);
            }
            DB::commit();
            return redirect()->route('procesarlote', $this->lotedeuda->lote_id)->with('success', 'Registro generado correctamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->emit('error', 'Ha ocurrido un error.');
        }
    }
}
