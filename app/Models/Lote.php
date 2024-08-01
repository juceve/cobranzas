<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lote
 *
 * @property $id
 * @property $codigo
 * @property $fecha
 * @property $avance
 * @property $empresa_id
 * @property $user_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa $empresa
 * @property User $user
 * @property Lotedeuda[] $lotedeudas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lote extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigo', 'fecha', 'avance', 'empresa_id', 'user_id', 'status'];


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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lotedeudas()
    {
        return $this->hasMany(\App\Models\Lotedeuda::class, 'id', 'lote_id');
    }
    
}
