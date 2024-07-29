<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vwdeudaslotes extends Model
{
    use HasFactory;

    public function zona()
    {
        return $this->hasOne(Zona::class, 'id', 'zona_id');
    }
}
