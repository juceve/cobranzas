<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deudore extends Model
{

    protected $perPage = 20;

    protected $fillable = ['codigocliente', 'cliente', 'docid', 'tipodoc_id', 'fechanacimiento', 'telffijo', 'telfcelular', 'telfref1', 'telfref2', 'telfref3', 'nacionalidad', 'pais', 'ciudad', 'domcoorx', 'domcoory', 'domdireccion', 'trabcoorx', 'trabcoory', 'trabdireccion', 'empresa_id'];


    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa_id', 'id');
    }

    public function tipodoc()
    {
        return $this->belongsTo(\App\Models\Tipodoc::class, 'tipodoc_id', 'id');
    }

    public function deudas()
    {
        return $this->hasMany(Deuda::class, 'deudore_id', 'id');
    }
}
