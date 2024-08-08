<?php

use App\Models\Compromisopago;
use Illuminate\Support\Facades\Auth;

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
