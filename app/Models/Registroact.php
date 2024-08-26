<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Registroact
 *
 * @property $id
 * @property $url
 * @property $fecha
 * @property $hora
 * @property $empresa_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa $empresa
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Registroact extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['url', 'fecha', 'hora', 'empresa_id', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function nuevadeudas()
    {
        return $this->hasMany(Nuevadeuda::class, 'registroact_id', 'id');
    }
}
