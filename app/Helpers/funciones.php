<?php

use App\Models\Compromisopago;
use App\Models\Metodopago;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }
}

function numToFloat($number)
{
    return number_format($number, 2, '.');
}

function compromisosHoy()
{
    $user = Auth::user();
    $compromisos = Compromisopago::where([['user_id', $user->id], ['contactado', false]])->get();
    return $compromisos->count();
}

function metodoPago($id)
{
    $metodo = Metodopago::find($id);

    return $metodo->nombre;
}

function ultContacto($deudore_id)
{
    $contacto = DB::select("SELECT co.* FROM contactos co
INNER JOIN lotedeudas ld ON ld.id = co.lotedeuda_id
INNER JOIN deudas de ON de.id = ld.deuda_id
WHERE de.deudore_id=$deudore_id
ORDER BY co.created_at DESC Limit 1");
    $fecha = '--';
    foreach ($contacto as $item) {
        $fecha = $item->fechacontacto;
    }
    return $fecha;
}

function fechaLiteral($fecha)
{
    // Array con los nombres de los meses en español
    $meses = [
        1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ];

    // Convertir la fecha a un timestamp
    $timestamp = strtotime($fecha);

    // Obtener el día, mes y año
    $dia = date('d', $timestamp);
    $mes = date('n', $timestamp); // Número del mes sin ceros delante
    $año = date('Y', $timestamp);

    // Construir la fecha literal en español
    return $dia . ' de ' . $meses[$mes] . ' de ' . $año;
}

function convertirFecha($fecha)
{
    // Crear un objeto DateTime a partir de la fecha dada
    $date = DateTime::createFromFormat('Y-m-d', $fecha);

    // Formatear la fecha al nuevo formato d/m/Y
    return $date->format('d/m/Y');
}
