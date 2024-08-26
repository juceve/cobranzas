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
