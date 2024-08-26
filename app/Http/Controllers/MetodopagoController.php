<?php

namespace App\Http\Controllers;

use App\Models\Metodopago;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MetodopagoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MetodopagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:metodopagos.index')->only('index');
        $this->middleware('can:metodopagos.create')->only('create', 'store');
        $this->middleware('can:metodopagos.edit')->only('edit', 'update');
        $this->middleware('can:metodopagos.destroy')->only('destroy');
    }
    public function index(Request $request): View
    {
        $metodopagos = Metodopago::paginate();

        return view('metodopago.index', compact('metodopagos'))
            ->with('i', ($request->input('page', 1) - 1) * $metodopagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $metodopago = new Metodopago();

        return view('metodopago.create', compact('metodopago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetodopagoRequest $request): RedirectResponse
    {
        Metodopago::create($request->validated());

        return Redirect::route('metodopagos.index')
            ->with('success', 'Metodopago created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $metodopago = Metodopago::find($id);

        return view('metodopago.show', compact('metodopago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $metodopago = Metodopago::find($id);

        return view('metodopago.edit', compact('metodopago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetodopagoRequest $request, Metodopago $metodopago): RedirectResponse
    {
        $metodopago->update($request->validated());

        return Redirect::route('metodopagos.index')
            ->with('success', 'Metodopago updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Metodopago::find($id)->delete();

        return Redirect::route('metodopagos.index')
            ->with('success', 'Metodopago deleted successfully');
    }
}
