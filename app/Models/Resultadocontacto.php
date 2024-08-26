<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resultadocontacto
 *
 * @property $id
 * @property $resultado_id
 * @property $contacto_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contacto $contacto
 * @property Resultado $resultado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Resultadocontacto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['resultado_id', 'contacto_id'];


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
    public function resultado()
    {
        return $this->belongsTo(\App\Models\Resultado::class, 'resultado_id', 'id');
    }
    
}
