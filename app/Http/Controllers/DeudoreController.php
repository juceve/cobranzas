<?php

namespace App\Http\Controllers;

use App\Models\Deudore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DeudoreRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DeudoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $deudores = Deudore::paginate();

        return view('deudore.index', compact('deudores'))
            ->with('i', ($request->input('page', 1) - 1) * $deudores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $deudore = new Deudore();

        return view('deudore.create', compact('deudore'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeudoreRequest $request): RedirectResponse
    {
        Deudore::create($request->validated());

        return Redirect::route('deudores.index')
            ->with('success', 'Deudore created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $deudore = Deudore::find($id);

        return view('deudore.show', compact('deudore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $deudore = Deudore::find($id);

        return view('deudore.edit', compact('deudore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeudoreRequest $request, Deudore $deudore): RedirectResponse
    {
        $deudore->update($request->validated());

        return Redirect::route('deudores.index')
            ->with('success', 'Deudore updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Deudore::find($id)->delete();

        return Redirect::route('deudores.index')
            ->with('success', 'Deudore deleted successfully');
    }
}
