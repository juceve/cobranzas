<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gestiontipo
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Lotedeuda[] $lotedeudas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gestiontipo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lotedeudas()
    {
        return $this->hasMany(\App\Models\Lotedeuda::class, 'id', 'gestiontipo_id');
    }
    
}
