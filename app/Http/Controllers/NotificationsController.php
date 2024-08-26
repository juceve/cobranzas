<?php

namespace App\Http\Controllers;

use App\Models\Compromisopago;
use App\Models\Recordatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function getNotificationsData(Request $request)
    {
        $user = Auth::user();
        if ($user->roles[0] == 'Operador') {
            $recordatorios = Recordatorio::where('user_id', $user->id)
                ->where('atendido', 0)
                ->get();
            $compromisos = Compromisopago::where('user_id', $user->id)
                ->where('contactado', 0)
                ->get();
        } else {
            $recordatorios = Recordatorio::where('user_id', $user->id)
                ->where('atendido', 0)
                ->get();
            $compromisos = Compromisopago::where('contactado', 0)->get();
        }

        $cantNoti = $recordatorios->count() + $compromisos->count();


        $notifications = [
            [
                'icon' => 'fas fa-fw fa-tags text-warning',
                'text' => $recordatorios->count() . ' nuevo(s) recordatorio(s)',
                'time' => '',
                'url'  => '/recordatorios',
            ],
            [
                'icon' => 'fas fa-fw fa-comment-dollar text-danger',
                'text' => $compromisos->count() . ' nuevo(s) compromiso(s)',
                'time' => '',
                'url'  => '/compromisos-pago',
            ],
        ];

        // Now, we create the notification dropdown main content.

        $dropdownHtml = '';

        foreach ($notifications as $key => $not) {
            $icon = "<i class='mr-2 {$not['icon']}'></i>";

            $time = "<span class='float-right text-muted text-sm'>
                   {$not['time']}
                 </span>";

            $dropdownHtml .= "<a href='{$not['url']}' class='dropdown-item'>
                            {$icon}{$not['text']}{$time}
                          </a>";

            if ($key < count($notifications) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
        }

        // Return the new notification data.

        return [
            'label' => $cantNoti,
            'label_color' => $cantNoti ? 'danger' : 'secondary',
            'icon_color' => 'dark',
            'dropdown' => $dropdownHtml,
        ];
    }

    public function show($lotedeuda_id) {}
}
