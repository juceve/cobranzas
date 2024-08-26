<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compromisopago
 *
 * @property $id
 * @property $fechahoracompromiso
 * @property $montocomprometido
 * @property $anotaciones
 * @property $fechahoracontacto
 * @property $contacto_id
 * @property $user_id
 * @property $contactado
 * @property $created_at
 * @property $updated_at
 *
 * @property Contacto $contacto
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
    protected $fillable = ['fechahoracompromiso', 'montocomprometido', 'anotaciones', 'fechahoracontacto', 'contacto_id', 'user_id', 'contactado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contacto()
    {
        return $this->belongsTo(\App\Models\Contacto::class, 'contacto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
