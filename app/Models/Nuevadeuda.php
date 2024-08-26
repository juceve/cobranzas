<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nuevadeuda
 *
 * @property $id
 * @property $deuda_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Deuda $deuda
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nuevadeuda extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['deuda_id', 'registroact_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deuda()
    {
        return $this->belongsTo(\App\Models\Deuda::class, 'deuda_id', 'id');
    }
    public function registroacts()
    {
        return $this->belongsTo(\App\Models\Registroact::class, 'registroact_id', 'id');
    }
}
