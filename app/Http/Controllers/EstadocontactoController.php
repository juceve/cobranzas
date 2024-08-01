<?php

namespace App\Http\Controllers;

use App\Models\Estadocontacto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadocontactoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadocontactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estadocontactos = Estadocontacto::paginate();

        return view('estadocontacto.index', compact('estadocontactos'))
            ->with('i', ($request->input('page', 1) - 1) * $estadocontactos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estadocontacto = new Estadocontacto();

        return view('estadocontacto.create', compact('estadocontacto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadocontactoRequest $request): RedirectResponse
    {
        Estadocontacto::create($request->validated());

        return Redirect::route('estadocontactos.index')
            ->with('success', 'Estadocontacto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estadocontacto = Estadocontacto::find($id);

        return view('estadocontacto.show', compact('estadocontacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estadocontacto = Estadocontacto::find($id);

        return view('estadocontacto.edit', compact('estadocontacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadocontactoRequest $request, Estadocontacto $estadocontacto): RedirectResponse
    {
        $estadocontacto->update($request->validated());

        return Redirect::route('estadocontactos.index')
            ->with('success', 'Estadocontacto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Estadocontacto::find($id)->delete();

        return Redirect::route('estadocontactos.index')
            ->with('success', 'Estadocontacto deleted successfully');
    }
}
