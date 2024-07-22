<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DeudaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $deudas = Deuda::paginate();

        return view('deuda.index', compact('deudas'))
            ->with('i', ($request->input('page', 1) - 1) * $deudas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $deuda = new Deuda();

        return view('deuda.create', compact('deuda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeudaRequest $request): RedirectResponse
    {
        Deuda::create($request->validated());

        return Redirect::route('deudas.index')
            ->with('success', 'Deuda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $deuda = Deuda::find($id);

        return view('deuda.show', compact('deuda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $deuda = Deuda::find($id);

        return view('deuda.edit', compact('deuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeudaRequest $request, Deuda $deuda): RedirectResponse
    {
        $deuda->update($request->validated());

        return Redirect::route('deudas.index')
            ->with('success', 'Deuda updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Deuda::find($id)->delete();

        return Redirect::route('deudas.index')
            ->with('success', 'Deuda deleted successfully');
    }
}
