<?php

namespace App\Http\Controllers;

use App\Models\Resultcontacto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ResultcontactoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ResultcontactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $resultcontactos = Resultcontacto::paginate();

        return view('resultcontacto.index', compact('resultcontactos'))
            ->with('i', ($request->input('page', 1) - 1) * $resultcontactos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $resultcontacto = new Resultcontacto();

        return view('resultcontacto.create', compact('resultcontacto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResultcontactoRequest $request): RedirectResponse
    {
        Resultcontacto::create($request->validated());

        return Redirect::route('resultcontactos.index')
            ->with('success', 'Resultcontacto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $resultcontacto = Resultcontacto::find($id);

        return view('resultcontacto.show', compact('resultcontacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $resultcontacto = Resultcontacto::find($id);

        return view('resultcontacto.edit', compact('resultcontacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResultcontactoRequest $request, Resultcontacto $resultcontacto): RedirectResponse
    {
        $resultcontacto->update($request->validated());

        return Redirect::route('resultcontactos.index')
            ->with('success', 'Resultcontacto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Resultcontacto::find($id)->delete();

        return Redirect::route('resultcontactos.index')
            ->with('success', 'Resultcontacto deleted successfully');
    }
}
