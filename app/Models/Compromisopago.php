<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compromisopago
 *
 * @property $id
 * @property $fechahoracompromiso
 * @property $montocomprometido
 * @property $lotedeuda_id
 * @property $anotaciones
 * @property $fechahoracontacto
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Lotedeuda $lotedeuda
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compromisopago extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fechahoracompromiso', 'montocomprometido', 'lotedeuda_id', 'anotaciones', 'fechahoracontacto', 'user_id', 'contactado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lotedeuda()
    {
        return $this->belongsTo(\App\Models\Lotedeuda::class, 'lotedeuda_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
