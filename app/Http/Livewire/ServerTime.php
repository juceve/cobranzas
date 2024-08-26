<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class ServerTime extends Component
{
    public $time;

    public function mount()
    {
        $this->time = Carbon::now()->format('H:i:s');
    }

    public function updateTime()
    {
        $this->time = Carbon::now()->format('H:i:s');
    }

    public function render()
    {
        return view('livewire.server-time');
    }
}
