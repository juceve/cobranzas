<?php

namespace App\Http\Controllers;

use App\Models\Citeinforme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CiteinformeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CiteinformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $citeinformes = Citeinforme::paginate();

        return view('citeinforme.index', compact('citeinformes'))
            ->with('i', ($request->input('page', 1) - 1) * $citeinformes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $citeinforme = new Citeinforme();

        return view('citeinforme.create', compact('citeinforme'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CiteinformeRequest $request): RedirectResponse
    {
        Citeinforme::create($request->validated());

        return Redirect::route('citeinformes.index')
            ->with('success', 'Citeinforme created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $citeinforme = Citeinforme::find($id);

        return view('citeinforme.show', compact('citeinforme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $citeinforme = Citeinforme::find($id);

        return view('citeinforme.edit', compact('citeinforme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CiteinformeRequest $request, Citeinforme $citeinforme): RedirectResponse
    {
        $citeinforme->update($request->validated());

        return Redirect::route('citeinformes.index')
            ->with('success', 'Citeinforme updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Citeinforme::find($id)->delete();

        return Redirect::route('citeinformes.index')
            ->with('success', 'Citeinforme deleted successfully');
    }
}
