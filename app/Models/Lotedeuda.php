<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lotedeuda extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['lote_id', 'deuda_id', 'contactado', 'gestiontipo_id', 'fechacontacto', 'nombrecontacto', 'proxcontacto', 'detalles', 'finalizado'];


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

    public function gestiontipo()
    {
        return $this->hasOne(Gestiontipo::class, 'gestiontipo_id', 'id');
    }
}
