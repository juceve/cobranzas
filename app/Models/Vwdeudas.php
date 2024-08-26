<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vwdeudas extends Model
{

    protected $perPage = 20;


    protected $fillable = ['fecha', 'numdoc', 'importe', 'saldo', 'vence', 'antiguedad', 'anticuacion', 'rango', 'cliente', 'clilugar', 'entnombrejefevendedor', 'entnombresupervisor', 'entnombrevendedor', 'plazo', 'fechaultimopago', 'ciunombre', 'deudore_id', 'limitecredito', 'rutid', 'coordenadax', 'coordenaday', 'telefono', 'estado', 'direccion', 'ctrlupdate', 'empresa_id', 'empresa', 'codigocliente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deudore()
    {
        return $this->belongsTo(\App\Models\Deudore::class, 'deudore_id', 'id');
    }

    public function empresainfo()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa_id', 'id');
    }
}
