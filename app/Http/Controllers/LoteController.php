<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:lotes.index')->only('index');
        $this->middleware('can:lotes.create')->only('create', 'store');
        $this->middleware('can:lotes.edit')->only('edit', 'update');
        $this->middleware('can:lotes.destroy')->only('destroy');
    }
    public function index(Request $request): View
    {
        $lotes = Lote::paginate();

        return view('lote.index', compact('lotes'))
            ->with('i', ($request->input('page', 1) - 1) * $lotes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lote = new Lote();

        return view('lote.create', compact('lote'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoteRequest $request): RedirectResponse
    {
        Lote::create($request->validated());

        return Redirect::route('lotes.index')
            ->with('success', 'Lote created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $lote = Lote::find($id);

        return view('lote.show', compact('lote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $lote = Lote::find($id);

        return view('lote.edit', compact('lote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoteRequest $request, Lote $lote): RedirectResponse
    {
        $lote->update($request->validated());

        return Redirect::route('lotes.index')
            ->with('success', 'Lote updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Lote::find($id)->delete();

        return Redirect::route('lotes.index')
            ->with('success', 'Lote deleted successfully');
    }
}
