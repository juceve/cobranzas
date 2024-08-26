<?php

namespace App\Http\Controllers;

use App\Models\Lotedeuda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LotedeudaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LotedeudaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:lotedeudas.index')->only('index');
        $this->middleware('can:lotedeudas.create')->only('create', 'store');
        $this->middleware('can:lotedeudas.edit')->only('edit', 'update');
        $this->middleware('can:lotedeudas.destroy')->only('destroy');
    }
    public function index(Request $request): View
    {
        $lotedeudas = Lotedeuda::paginate();

        return view('lotedeuda.index', compact('lotedeudas'))
            ->with('i', ($request->input('page', 1) - 1) * $lotedeudas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lotedeuda = new Lotedeuda();

        return view('lotedeuda.create', compact('lotedeuda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LotedeudaRequest $request): RedirectResponse
    {
        Lotedeuda::create($request->validated());

        return Redirect::route('lotedeudas.index')
            ->with('success', 'Lotedeuda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $lotedeuda = Lotedeuda::find($id);

        return view('lotedeuda.show', compact('lotedeuda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $lotedeuda = Lotedeuda::find($id);

        return view('lotedeuda.edit', compact('lotedeuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LotedeudaRequest $request, Lotedeuda $lotedeuda): RedirectResponse
    {
        $lotedeuda->update($request->validated());

        return Redirect::route('lotedeudas.index')
            ->with('success', 'Lotedeuda updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Lotedeuda::find($id)->delete();

        return Redirect::route('lotedeudas.index')
            ->with('success', 'Lotedeuda deleted successfully');
    }
}
