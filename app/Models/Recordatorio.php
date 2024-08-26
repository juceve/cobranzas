<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recordatorio
 *
 * @property $id
 * @property $titulo
 * @property $cuerpo
 * @property $fecha
 * @property $user_id
 * @property $model
 * @property $modelid
 * @property $atendido
 * @property $fechahoraatencion
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Recordatorio extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['titulo', 'cuerpo', 'fecha', 'user_id', 'model', 'modelid', 'atendido', 'fechahoraatencion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function modelo()
    {
        return $this->hasOne($this->model, 'id', 'modelid');
    }
}
