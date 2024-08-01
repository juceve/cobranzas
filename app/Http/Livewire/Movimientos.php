<?php

namespace App\Http\Livewire;

use App\Models\Deuda;
use App\Models\Movimiento;
use Livewire\Component;

class Movimientos extends Component
{
    public $deuda, $movimiento;

    public function mount($deuda_id)
    {
        $this->deuda = Deuda::find($deuda_id);
    }

    public function render()
    {
        return view('livewire.movimientos');
    }

    public function viewMovimiento($movimiento_id)
    {
        $this->reset('movimiento');
        $this->movimiento = Movimiento::find($movimiento_id);
    }
}
