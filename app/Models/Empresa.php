<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'direccion', 'nit', 'email', 'telefono', 'personacontacto', 'celularcontacto', 'status'];
}
