<?php

namespace App\Http\Livewire;

use App\Models\Citeinforme;
use App\Models\Empresa;
use App\Models\Puntoinforme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NuevoCiteInforme extends Component
{
    public $empresa_id;
    public $fecha = "", $fechainicial = "", $fechafinal = "", $receptor = "", $cargoreceptor = "", $referencia = "", $puntos = [], $detalle = "";

    public function mount($empresa_id = NULL)
    {
        if ($empresa_id) {
            $this->empresa_id = $empresa_id;
        }
    }

    public function render()
    {
        $empresas = Empresa::all();
        if ($empresas->count()) {
            $this->empresa_id = $empresas->first()->id;
        }

        return view('livewire.nuevo-cite-informe', compact('empresas'))->extends('adminlte::page');
    }

    public function addPunto()
    {
        if ($this->detalle != "") {
            $this->puntos[] = $this->detalle;
            $this->reset('detalle');
        }
    }

    public function delPunto($i)
    {
        unset($this->puntos[$i]);
        $this->puntos = array_values($this->puntos);
    }

    protected $listeners = ['registrar'];

    protected $rules = [
        "fecha" => "required",
        "fechainicial" => "required",
        "fechafinal" => "required",
        "receptor" => "required",
        "referencia" => "required",
        "cargoreceptor" => "required",
        "puntos" => "required",
    ];

    public function registrar()
    {
        $this->validate();
        DB::beginTransaction();
        try {

            // SI ES REQUERIDO CREAR PREVIAMENTE EL CITE

            $citeinforme = Citeinforme::create([
                "fecha" => $this->fecha,
                "fechainicial" => $this->fechainicial,
                "fechafinal" => $this->fechafinal,
                "referencia" => $this->referencia,
                "receptor" => $this->receptor,
                "cargoreceptor" => $this->cargoreceptor,
                "user_id" => Auth::user()->id,
                "empresa_id" => $this->empresa_id,
            ]);

            foreach ($this->puntos as $item) {
                $puntoinforme = Puntoinforme::create([
                    "citeinforme_id" => $citeinforme->id,
                    "detalle" => $item,
                ]);
            }

            DB::commit();
            return redirect()->route('citeinformes')->with('successprint', $citeinforme->id);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('error', 'Ha ocurrido un error.');
        }
    }
}
