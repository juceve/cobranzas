<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Citeinforme
 *
 * @property $id
 * @property $correlativo
 * @property $cite
 * @property $fecha
 * @property $receptor
 * @property $cargoreceptor
 * @property $referencia
 * @property $fechainicial
 * @property $fechafinal
 * @property $user_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Puntoinforme[] $puntoinformes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Citeinforme extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['correlativo', 'cite', 'fecha', 'receptor', 'cargoreceptor', 'referencia', 'fechainicial', 'fechafinal', 'user_id', 'empresa_id', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntoinformes()
    {
        return $this->hasMany(\App\Models\Puntoinforme::class, 'id', 'citeinforme_id');
    }

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'empresa_id', 'id');
    }
}
