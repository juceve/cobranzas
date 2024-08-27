<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{

    protected $perPage = 20;

    protected $fillable = ['fecha', 'numdoc', 'importe', 'saldo', 'saldointerno', 'vence', 'antiguedad', 'anticuacion', 'rango', 'cliente', 'clilugar', 'entnombrejefevendedor', 'entnombresupervisor', 'entnombrevendedor', 'plazo', 'fechaultimopago', 'ciunombre', 'deudore_id', 'limitecredito', 'rutid', 'zona_id', 'coordenadax', 'coordenaday', 'telefono', 'estado', 'direccion', 'direccioninterna', 'ctrlupdate'];

    public function deudore()
    {
        return $this->hasOne(Deudore::class, 'id', 'deudore_id');
    }

    public function zona()
    {
        return $this->hasOne(Zona::class, 'id', 'zona_id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'deuda_id', 'id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'deuda_id', 'id');
    }
}
