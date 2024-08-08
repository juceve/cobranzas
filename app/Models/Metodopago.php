<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Metodopago
 *
 * @property $id
 * @property $nombre
 * @property $nombrecorto
 * @property $created_at
 * @property $updated_at
 *
 * @property Pago[] $pagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Metodopago extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'nombrecorto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany(\App\Models\Pago::class, 'id', 'metodopago_id');
    }
    
}
