<?php

namespace App\Http\Controllers;

use App\Models\Deudore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DeudoreRequest;
use App\Models\Tipodoc;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DeudoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:deudores.index')->only('index');
        // $this->middleware('can:deudores.create')->only('create', 'store');
        $this->middleware('can:deudores.edit')->only('edit', 'update');
        $this->middleware('can:deudores.destroy')->only('destroy');
    }

    public function index(Request $request): View
    {
        $deudores = Deudore::all();

        return view('deudore.index', compact('deudores'));
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

        return view('deudore.show', compact('deudore'))->with('i', 0);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $deudore = Deudore::find($id);
        $tipodocs = Tipodoc::all()->pluck('nombre', 'id');
        return view('deudore.edit', compact('deudore', 'tipodocs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeudoreRequest $request, Deudore $deudore): RedirectResponse
    {

        $deudore->docid = $request->docid;
        $deudore->tipodoc_id = $request->tipodoc_id;
        $deudore->fechanacimiento = $request->fechanacimiento;
        $deudore->telffijo = $request->telffijo;

        $deudore->telfref1 = $request->telfref1;
        $deudore->telfref2 = $request->telfref2;
        $deudore->telfref3 = $request->telfref3;
        $deudore->nacionalidad = $request->nacionalidad;
        $deudore->pais = $request->pais;

        $deudore->domcoorx = $request->domcoorx;
        $deudore->domcoory = $request->domcoory;
        $deudore->domdireccion = $request->domdireccion;
        $deudore->trabcoorx = $request->trabcoorx;
        $deudore->trabcoory = $request->trabcoory;
        $deudore->trabdireccion = $request->trabdireccion;
        $deudore->save();


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
