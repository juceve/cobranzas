<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimiento
 *
 * @property $id
 * @property $deuda_id
 * @property $user_id
 * @property $fecha
 * @property $saldoanterior
 * @property $saldonuevo
 * @property $fecultpagoanterior
 * @property $fecultpagonuevo
 * @property $rangoanterior
 * @property $rangonuevo
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Deuda $deuda
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movimiento extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['deuda_id', 'user_id', 'fecha', 'saldoanterior', 'saldonuevo', 'fecultpagoanterior', 'fecultpagonuevo', 'rangoanterior', 'rangonuevo', 'status', 'observaciones'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deuda()
    {
        return $this->belongsTo(\App\Models\Deuda::class, 'deuda_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
