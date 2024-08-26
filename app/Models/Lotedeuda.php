<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lotedeuda
 *
 * @property $id
 * @property $lote_id
 * @property $deuda_id
 * @property $fechahoracobro
 * @property $finalizado
 * @property $created_at
 * @property $updated_at
 *
 * @property Deuda $deuda
 * @property Lote $lote
 * @property Contacto[] $contactos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lotedeuda extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['lote_id', 'deuda_id', 'fechahoracobro', 'finalizado'];


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
    public function lote()
    {
        return $this->belongsTo(\App\Models\Lote::class, 'lote_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactos()
    {
        return $this->hasMany(\App\Models\Contacto::class, 'id', 'lotedeuda_id');
    }
    
}
