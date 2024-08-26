<?php

namespace App\Http\Controllers;

use App\Models\Vwrpt1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rpt1 = new Vwrpt1();
        if (Auth::user()->roles[0]->name == 'Operador') {
            $rpt1 = Vwrpt1::where('user_id', Auth::user()->id)->first();
        } else {
            $rpt1 = DB::table('vwrpt1s')
                ->select(
                    DB::raw('SUM(cantdeudas) as cantdeudas'),
                    DB::raw('SUM(cantpagos) as cantpagos'),
                    DB::raw('SUM(cantrecordatorios) as cantrecordatorios'),
                    DB::raw('SUM(cantcompromisos) as cantcompromisos')
                )
                ->first();
        }

        $anticuaciones = DB::select("SELECT anticuacion, COUNT(*) cantidad FROM deudas GROUP BY anticuacion ORDER BY anticuacion ASC");


        return view('home', compact('rpt1', 'anticuaciones'));
    }
}
