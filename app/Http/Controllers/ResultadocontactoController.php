<?php

namespace App\Http\Controllers;

use App\Models\Resultadocontacto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ResultadocontactoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ResultadocontactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $resultadocontactos = Resultadocontacto::paginate();

        return view('resultadocontacto.index', compact('resultadocontactos'))
            ->with('i', ($request->input('page', 1) - 1) * $resultadocontactos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $resultadocontacto = new Resultadocontacto();

        return view('resultadocontacto.create', compact('resultadocontacto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResultadocontactoRequest $request): RedirectResponse
    {
        Resultadocontacto::create($request->validated());

        return Redirect::route('resultadocontactos.index')
            ->with('success', 'Resultadocontacto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $resultadocontacto = Resultadocontacto::find($id);

        return view('resultadocontacto.show', compact('resultadocontacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $resultadocontacto = Resultadocontacto::find($id);

        return view('resultadocontacto.edit', compact('resultadocontacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResultadocontactoRequest $request, Resultadocontacto $resultadocontacto): RedirectResponse
    {
        $resultadocontacto->update($request->validated());

        return Redirect::route('resultadocontactos.index')
            ->with('success', 'Resultadocontacto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Resultadocontacto::find($id)->delete();

        return Redirect::route('resultadocontactos.index')
            ->with('success', 'Resultadocontacto deleted successfully');
    }
}
