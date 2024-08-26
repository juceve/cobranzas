<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ContactoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:contactos.index')->only('index');
        $this->middleware('can:contactos.create')->only('create', 'store');
        $this->middleware('can:contactos.edit')->only('edit', 'update');
        $this->middleware('can:contactos.destroy')->only('destroy');
    }
    public function index(Request $request): View
    {
        $contactos = Contacto::paginate();

        return view('contacto.index', compact('contactos'))
            ->with('i', ($request->input('page', 1) - 1) * $contactos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $contacto = new Contacto();

        return view('contacto.create', compact('contacto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactoRequest $request): RedirectResponse
    {
        Contacto::create($request->validated());

        return Redirect::route('contactos.index')
            ->with('success', 'Contacto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $contacto = Contacto::find($id);

        return view('contacto.show', compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $contacto = Contacto::find($id);

        return view('contacto.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactoRequest $request, Contacto $contacto): RedirectResponse
    {
        $contacto->update($request->validated());

        return Redirect::route('contactos.index')
            ->with('success', 'Contacto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Contacto::find($id)->delete();

        return Redirect::route('contactos.index')
            ->with('success', 'Contacto deleted successfully');
    }
}
