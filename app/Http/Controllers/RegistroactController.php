<?php

namespace App\Http\Controllers;

use App\Models\Registroact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroactRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegistroactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $registroacts = Registroact::paginate();

        return view('registroact.index', compact('registroacts'))
            ->with('i', ($request->input('page', 1) - 1) * $registroacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $registroact = new Registroact();

        return view('registroact.create', compact('registroact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistroactRequest $request): RedirectResponse
    {
        Registroact::create($request->validated());

        return Redirect::route('registroacts.index')
            ->with('success', 'Registroact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $registroact = Registroact::find($id);

        return view('registroact.show', compact('registroact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $registroact = Registroact::find($id);

        return view('registroact.edit', compact('registroact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegistroactRequest $request, Registroact $registroact): RedirectResponse
    {
        $registroact->update($request->validated());

        return Redirect::route('registroacts.index')
            ->with('success', 'Registroact updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Registroact::find($id)->delete();

        return Redirect::route('registroacts.index')
            ->with('success', 'Registroact deleted successfully');
    }
}
