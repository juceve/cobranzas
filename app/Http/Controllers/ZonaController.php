<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ZonaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ZonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:zonas.index')->only('index');
        $this->middleware('can:zonas.create')->only('create', 'store');
        $this->middleware('can:zonas.edit')->only('edit', 'update');
        $this->middleware('can:zonas.destroy')->only('destroy');
    }


    public function index(Request $request): View
    {
        $zonas = Zona::all();

        return view('zona.index', compact('zonas'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $zona = new Zona();

        return view('zona.create', compact('zona'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ZonaRequest $request): RedirectResponse
    {
        Zona::create($request->validated());

        return Redirect::route('zonas.index')
            ->with('success', 'Zona creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $zona = Zona::find($id);

        return view('zona.show', compact('zona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $zona = Zona::find($id);

        return view('zona.edit', compact('zona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ZonaRequest $request, Zona $zona): RedirectResponse
    {
        $zona->update($request->validated());

        return Redirect::route('zonas.index')
            ->with('success', 'Zona editada correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Zona::find($id)->delete();

        return Redirect::route('zonas.index')
            ->with('success', 'Zona eliminada correctamente.');
    }
}
