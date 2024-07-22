<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Deuda
 *
 * @property $id
 * @property $fecha
 * @property $numdoc
 * @property $importe
 * @property $saldo
 * @property $vence
 * @property $antiguedad
 * @property $anticuacion
 * @property $rango
 * @property $cliente
 * @property $clilugar
 * @property $entnombrejefevendedor
 * @property $entnombresupervisor
 * @property $entnombrevendedor
 * @property $plazo
 * @property $fechaultimopago
 * @property $ciunombre
 * @property $deudore_id
 * @property $limitecredito
 * @property $rutid
 * @property $coordenadax
 * @property $coordenaday
 * @property $telefono
 * @property $estado
 * @property $direccion
 * @property $ctrlupdate
 * @property $created_at
 * @property $updated_at
 *
 * @property Deudore $deudore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Deuda extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fecha', 'numdoc', 'importe', 'saldo', 'vence', 'antiguedad', 'anticuacion', 'rango', 'cliente', 'clilugar', 'entnombrejefevendedor', 'entnombresupervisor', 'entnombrevendedor', 'plazo', 'fechaultimopago', 'ciunombre', 'deudore_id', 'limitecredito', 'rutid', 'coordenadax', 'coordenaday', 'telefono', 'estado', 'direccion', 'ctrlupdate'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deudore()
    {
        return $this->belongsTo(\App\Models\Deudore::class, 'deudore_id', 'id');
    }
    
}
