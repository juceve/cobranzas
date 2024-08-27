<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $fechahorapago
 * @property $user_id
 * @property $compromisopago_id
 * @property $ncobrador
 * @property $monto
 * @property $saldoantespago
 * @property $saldodespuespago
 * @property $metodopago_id
 * @property $comprobantes
 * @property $created_at
 * @property $updated_at
 *
 * @property Compromisopago $compromisopago
 * @property Metodopago $metodopago
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fechahorapago', 'user_id', 'compromisopago_id', 'deuda_id', 'ncobrador', 'monto', 'saldoantespago', 'saldodespuespago', 'metodopago_id', 'comprobantes', 'resultado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compromisopago()
    {
        return $this->belongsTo(\App\Models\Compromisopago::class, 'compromisopago_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function metodopago()
    {
        return $this->hasOne(Metodopago::class, 'id', 'metodopago_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
