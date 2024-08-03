<?php

namespace App\Http\Controllers;

use App\Models\Compromisopago;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CompromisopagoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CompromisopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $compromisopagos = Compromisopago::paginate();

        return view('compromisopago.index', compact('compromisopagos'))
            ->with('i', ($request->input('page', 1) - 1) * $compromisopagos->perPage());
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

        return view('compromisopago.edit', compact('compromisopago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompromisopagoRequest $request, Compromisopago $compromisopago): RedirectResponse
    {
        $compromisopago->update($request->validated());

        return Redirect::route('compromisopagos.index')
            ->with('success', 'Compromisopago updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Compromisopago::find($id)->delete();

        return Redirect::route('compromisopagos.index')
            ->with('success', 'Compromisopago deleted successfully');
    }
}
