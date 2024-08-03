<?php

namespace App\Http\Controllers;

use App\Models\Recordatorio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RecordatorioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RecordatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $recordatorios = Recordatorio::paginate();

        return view('recordatorio.index', compact('recordatorios'))
            ->with('i', ($request->input('page', 1) - 1) * $recordatorios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $recordatorio = new Recordatorio();

        return view('recordatorio.create', compact('recordatorio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecordatorioRequest $request): RedirectResponse
    {
        Recordatorio::create($request->validated());

        return Redirect::route('recordatorios.index')
            ->with('success', 'Recordatorio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $recordatorio = Recordatorio::find($id);

        return view('recordatorio.show', compact('recordatorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $recordatorio = Recordatorio::find($id);

        return view('recordatorio.edit', compact('recordatorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecordatorioRequest $request, Recordatorio $recordatorio): RedirectResponse
    {
        $recordatorio->update($request->validated());

        return Redirect::route('recordatorios.index')
            ->with('success', 'Recordatorio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Recordatorio::find($id)->delete();

        return Redirect::route('recordatorios.index')
            ->with('success', 'Recordatorio deleted successfully');
    }
}
