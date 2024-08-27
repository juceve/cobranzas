<?php

namespace App\Http\Controllers;

use App\Models\Compromisopago;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CompromisopagoRequest;
use App\Models\Metodopago;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CompromisopagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:compromisopagos.index')->only('index');
        $this->middleware('can:compromisopagos.create')->only('create', 'store');
        $this->middleware('can:compromisopagos.edit')->only('edit', 'update');
        $this->middleware('can:compromisopagos.destroy')->only('destroy');
    }

    public function index(Request $request): View
    {
        if (Auth::user()->roles[0]->name == 'Operador') {
            $compromisopagos = Compromisopago::where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $compromisopagos = Compromisopago::orderBy('id', 'desc')
                ->get();
        }



        return view('compromisopago.index', compact('compromisopagos'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $compromisopago = new Compromisopago();

        return view('compromisopago.create', compact('compromisopago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompromisopagoRequest $request): RedirectResponse
    {
        Compromisopago::create($request->validated());

        return Redirect::route('compromisopagos.index')
            ->with('success', 'Compromisopago created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $compromisopago = Compromisopago::find($id);

        return view('compromisopago.show', compact('compromisopago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $compromisopago = Compromisopago::find($id);
        $deuda = $compromisopago->contacto->lotedeuda->deuda;
        $contacto = $compromisopago->contacto;
        $metodos = Metodopago::all();
        $pago = new Pago();
        $enablePago = "";
        return view('compromisopago.edit', compact('compromisopago', 'deuda', 'contacto', 'metodos', 'pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $compromisopago_id)
    {
        // $compromisopago = Compromisopago::find($compromisopago_id);
        // if ($request->enablePago) {
        //     $request->validate([
        //         "anotaciones" => "required",
        //         "monto" => "required",
        //         "metodopago_id" => "required",
        //     ]);
        // } else {
        //     $request->validate([
        //         "anotaciones" => "required",
        //     ]);
        // }


        // $deuda = $compromisopago->contacto->lotedeuda->deuda;


    }

    public function destroy($id): RedirectResponse
    {
        Compromisopago::find($id)->delete();

        return Redirect::route('compromisopagos.index')
            ->with('success', 'Compromisopago deleted successfully');
    }
}
