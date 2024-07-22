<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Deudore
 *
 * @property $id
 * @property $codigocliente
 * @property $cliente
 * @property $docid
 * @property $tipodoc_id
 * @property $fechanacimiento
 * @property $telffijo
 * @property $telfcelular
 * @property $telfref1
 * @property $telfref2
 * @property $telfref3
 * @property $nacionalidad
 * @property $pais
 * @property $ciudad
 * @property $domcoorx
 * @property $domcoory
 * @property $domdireccion
 * @property $trabcoorx
 * @property $trabcoory
 * @property $trabdireccion
 * @property $empresa_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa $empresa
 * @property Tipodoc $tipodoc
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Deudore extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigocliente', 'cliente', 'docid', 'tipodoc_id', 'fechanacimiento', 'telffijo', 'telfcelular', 'telfref1', 'telfref2', 'telfref3', 'nacionalidad', 'pais', 'ciudad', 'domcoorx', 'domcoory', 'domdireccion', 'trabcoorx', 'trabcoory', 'trabdireccion', 'empresa_id'];


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
    public function tipodoc()
    {
        return $this->belongsTo(\App\Models\Tipodoc::class, 'tipodoc_id', 'id');
    }
    
}
