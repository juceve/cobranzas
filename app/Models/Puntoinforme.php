<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puntoinforme
 *
 * @property $id
 * @property $citeinforme_id
 * @property $detalle
 * @property $created_at
 * @property $updated_at
 *
 * @property Citeinforme $citeinforme
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Puntoinforme extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['citeinforme_id', 'detalle'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function citeinforme()
    {
        return $this->belongsTo(\App\Models\Citeinforme::class, 'citeinforme_id', 'id');
    }
    
}
