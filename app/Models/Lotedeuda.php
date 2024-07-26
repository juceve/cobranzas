<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lotedeuda
 *
 * @property $id
 * @property $lote_id
 * @property $deuda_id
 * @property $contactado
 * @property $fechacontacto
 * @property $nombrecontacto
 * @property $proxcontacto
 * @property $detalles
 * @property $finalizado
 * @property $created_at
 * @property $updated_at
 *
 * @property Deuda $deuda
 * @property Lote $lote
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
    protected $fillable = ['lote_id', 'deuda_id', 'contactado', 'fechacontacto', 'nombrecontacto', 'proxcontacto', 'detalles', 'finalizado'];


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
    
}
