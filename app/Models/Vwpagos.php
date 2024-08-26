<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vwpagos extends Model
{

    protected $perPage = 20;

    public function compromisopagos()
    {
        return $this->hasOne(Compromisopago::class, 'id', 'compromisopago_id');
    }
}
