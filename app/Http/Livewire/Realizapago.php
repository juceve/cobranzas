<?php

namespace App\Http\Livewire;

use App\Models\Compromisopago;
use App\Models\Deuda;
use App\Models\Metodopago;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class Realizapago extends Component
{
    use WithFileUploads;
    public $compromisopago, $deuda, $contacto,  $metodos, $pago, $enablePago = false;
    public $montocomprometido = 0, $metodopago_id = "", $observaciones = "", $comprobantes = [], $anotaciones, $numdoc;

    public function mount($id)
    {

        $this->compromisopago = Compromisopago::find($id);
        $this->montocomprometido = $this->compromisopago->montocomprometido;
        $this->anotaciones = $this->compromisopago->anotaciones;
        $this->deuda = $this->compromisopago->contacto->lotedeuda->deuda;
        $this->numdoc = $this->deuda->numdoc;
        $this->contacto = $this->compromisopago->contacto;
        $this->metodos = Metodopago::all();
        $this->pago = new Pago();
    }
    public function render()
    {
        return view('livewire.realizapago');
    }

    protected function rules()
    {
        if ($this->enablePago) {
            return [
                "anotaciones" => "required",
                "montocomprometido" => "required",
                "metodopago_id" => "required",
            ];
        } else {
            return [
                "anotaciones" => "required",
            ];
        }
    }

    public function cambiaDeuda($id)
    {
        $this->deuda = Deuda::find($id);
        $this->numdoc = $this->deuda->numdoc;
    }

    protected $listeners = ['registrar'];

    public function registrar()
    {

        $this->validate();

        try {
            DB::transaction(function () {
                $this->compromisopago->anotaciones = $this->anotaciones;
                $this->compromisopago->user_id = Auth::user()->id;
                $this->compromisopago->fechahoracontacto = date('Y-m-d H:i:s');
                $this->compromisopago->contactado = true;
                $this->compromisopago->save();

                if ($this->enablePago) {
                    $pago = Pago::create([
                        'fechahorapago' => date('Y-m-d H:i:s'),
                        'user_id' => Auth::user()->id,
                        'compromisopago_id' => $this->compromisopago->id,
                        'deuda_id' => $this->deuda->id,
                        'monto' => $this->montocomprometido,
                        'saldoantespago' => $this->deuda->saldointerno,
                        'saldodespuespago' => ($this->deuda->saldointerno - $this->montocomprometido),
                        'metodopago_id' => $this->metodopago_id,
                        'ncobrador' => $this->observaciones,

                    ]);

                    $this->deuda->saldointerno -= $pago->monto;
                    $this->deuda->save();
                    // $archivos = $this->comprobantes;

                    // Iterar sobre cada archivo y guardarlo
                    $comprobantes = "";
                    $i = 1;
                    if (count($this->comprobantes)) {
                        foreach ($this->comprobantes as $file) {
                            // $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                            $extension = $file->getClientOriginalExtension();
                            // $timestamp = now()->timestamp;
                            $filename = $pago->id . '_' . time() . $i . rand(1, 100) . '.' . $extension;
                            $ruta = 'uploads/comprobantes/' . $filename;


                            // Guardar el archivo en la ruta deseada con el nombre específico
                            $file->storeAs('uploads/comprobantes/', $filename);
                            $i++;
                            $comprobantes .= $ruta . '|';
                        }

                        if ($comprobantes != "") {
                            $comprobantes = substr($comprobantes, 0, -1);
                        }

                        $pago->comprobantes = $comprobantes;
                        $pago->save();
                    }
                }
            });
            return Redirect::route('compromisopagos.index')
                ->with('success', 'Operaciones realizadas correctamente');
        } catch (\Throwable $th) {

            return Redirect::route('compromisopagos.index')
                ->with('error', 'Ha ocurrido un error.');
        }
    }
}
