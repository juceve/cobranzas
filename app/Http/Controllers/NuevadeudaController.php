<?php

namespace App\Http\Controllers;

use App\Models\Nuevadeuda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NuevadeudaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NuevadeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $nuevadeudas = Nuevadeuda::paginate();

        return view('nuevadeuda.index', compact('nuevadeudas'))
            ->with('i', ($request->input('page', 1) - 1) * $nuevadeudas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $nuevadeuda = new Nuevadeuda();

        return view('nuevadeuda.create', compact('nuevadeuda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NuevadeudaRequest $request): RedirectResponse
    {
        Nuevadeuda::create($request->validated());

        return Redirect::route('nuevadeudas.index')
            ->with('success', 'Nuevadeuda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $nuevadeuda = Nuevadeuda::find($id);

        return view('nuevadeuda.show', compact('nuevadeuda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $nuevadeuda = Nuevadeuda::find($id);

        return view('nuevadeuda.edit', compact('nuevadeuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NuevadeudaRequest $request, Nuevadeuda $nuevadeuda): RedirectResponse
    {
        $nuevadeuda->update($request->validated());

        return Redirect::route('nuevadeudas.index')
            ->with('success', 'Nuevadeuda updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Nuevadeuda::find($id)->delete();

        return Redirect::route('nuevadeudas.index')
            ->with('success', 'Nuevadeuda deleted successfully');
    }
}
