<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['lotedeuda_id', 'estadocontacto_id', 'gestiontipo_id', 'fechacontacto', 'horacontacto', 'nombrecontacto', 'proxcontacto', 'detalles', 'solicitudempresa', 'accionpropia', 'urlfoto', 'user_id', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadocontacto()
    {
        return $this->belongsTo(\App\Models\Estadocontacto::class, 'estadocontacto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gestiontipo()
    {
        return $this->belongsTo(\App\Models\Gestiontipo::class, 'gestiontipo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lotedeuda()
    {
        return $this->belongsTo(\App\Models\Lotedeuda::class, 'lotedeuda_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function resultados()
    {
        return $this->hasMany(Resultadocontacto::class, 'id', 'contacto_id');
    }
}
