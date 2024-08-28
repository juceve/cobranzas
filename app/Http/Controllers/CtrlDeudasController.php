<?php

namespace App\Http\Controllers;

use App\Models\Registroact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CtrlDeudasController extends Controller
{
    public function data()
    {

        $registrosPorSemana = Registroact::all();

        $fechas = [];
        $cantidades = [];

        $fechas[] = "Inicio";
        $cantidades[] = 0;

        foreach ($registrosPorSemana as $registro) {
            $fechas[] = $registro->fecha;
            $cantidades[] = (int)$registro->nuevadeudas->count();
        }

        return response()->json([
            'fechas' => $fechas,
            'cantidades' => $cantidades,
        ]);
    }
}
