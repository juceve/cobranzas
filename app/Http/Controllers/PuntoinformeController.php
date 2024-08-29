<?php

namespace App\Http\Controllers;

use App\Models\Puntoinforme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PuntoinformeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PuntoinformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $puntoinformes = Puntoinforme::paginate();

        return view('puntoinforme.index', compact('puntoinformes'))
            ->with('i', ($request->input('page', 1) - 1) * $puntoinformes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $puntoinforme = new Puntoinforme();

        return view('puntoinforme.create', compact('puntoinforme'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PuntoinformeRequest $request): RedirectResponse
    {
        Puntoinforme::create($request->validated());

        return Redirect::route('puntoinformes.index')
            ->with('success', 'Puntoinforme created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $puntoinforme = Puntoinforme::find($id);

        return view('puntoinforme.show', compact('puntoinforme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $puntoinforme = Puntoinforme::find($id);

        return view('puntoinforme.edit', compact('puntoinforme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PuntoinformeRequest $request, Puntoinforme $puntoinforme): RedirectResponse
    {
        $puntoinforme->update($request->validated());

        return Redirect::route('puntoinformes.index')
            ->with('success', 'Puntoinforme updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Puntoinforme::find($id)->delete();

        return Redirect::route('puntoinformes.index')
            ->with('success', 'Puntoinforme deleted successfully');
    }
}
