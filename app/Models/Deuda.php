<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{

    protected $perPage = 20;

    protected $fillable = ['fecha', 'numdoc', 'importe', 'saldo', 'vence', 'antiguedad', 'anticuacion', 'rango', 'cliente', 'clilugar', 'entnombrejefevendedor', 'entnombresupervisor', 'entnombrevendedor', 'plazo', 'fechaultimopago', 'ciunombre', 'deudore_id', 'limitecredito', 'rutid', 'zona_id', 'coordenadax', 'coordenaday', 'telefono', 'estado', 'direccion', 'ctrlupdate'];

    public function deudore()
    {
        return $this->belongsTo(\App\Models\Deudore::class, 'deudore_id', 'id');
    }

    public function zona()
    {
        return $this->hasOne(Zona::class, 'zona_id', 'id');
    }
}
