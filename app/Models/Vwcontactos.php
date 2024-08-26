<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vwcontactos extends Model
{


    public function estadocontacto()
    {
        return $this->belongsTo(\App\Models\Estadocontacto::class, 'estadocontacto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gestiontipo()
    {
        return $this->belongsTo(\App\Models\Gestiontipo::class, 'gestiontipo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lotedeuda()
    {
        return $this->belongsTo(\App\Models\Lotedeuda::class, 'lotedeuda_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    public function pago()
    {
        return $this->belongsTo(\App\Models\Pago::class, 'pago_id', 'id');
    }
    public function compromisopago()
    {
        return $this->belongsTo(\App\Models\Compromisopago::class, 'compromisopago_id', 'id');
    }

    public function deuda()
    {
        return $this->hasOne(Deuda::class, 'id', 'deuda_id');
    }

    public function resultados()
    {
        return $this->hasMany(Resultadocontacto::class, 'contacto_id', 'id');
    }
}
