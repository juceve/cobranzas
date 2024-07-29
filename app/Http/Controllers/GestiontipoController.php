<?php

namespace App\Http\Controllers;

use App\Models\Gestiontipo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GestiontipoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GestiontipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:gestiontipos.index')->only('index');
        $this->middleware('can:gestiontipos.create')->only('create', 'store');
        $this->middleware('can:gestiontipos.edit')->only('edit', 'update');
        $this->middleware('can:gestiontipos.destroy')->only('destroy');
    }

    public function index(Request $request): View
    {
        $gestiontipos = Gestiontipo::all();

        return view('gestiontipo.index', compact('gestiontipos'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $gestiontipo = new Gestiontipo();

        return view('gestiontipo.create', compact('gestiontipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GestiontipoRequest $request): RedirectResponse
    {
        Gestiontipo::create($request->validated());

        return Redirect::route('gestiontipos.index')
            ->with('success', 'Tipo Gestión creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $gestiontipo = Gestiontipo::find($id);

        return view('gestiontipo.show', compact('gestiontipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $gestiontipo = Gestiontipo::find($id);

        return view('gestiontipo.edit', compact('gestiontipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GestiontipoRequest $request, Gestiontipo $gestiontipo): RedirectResponse
    {
        $gestiontipo->update($request->validated());

        return Redirect::route('gestiontipos.index')
            ->with('success', 'Tipo Gestión editado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Gestiontipo::find($id)->delete();

        return Redirect::route('gestiontipos.index')
            ->with('success', 'Tipo Gestión eliminado correctamente');
    }
}
