<?php

namespace App\Http\Controllers;

use App\Models\Recordatorio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RecordatorioRequest;
use App\Models\Contacto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RecordatorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:recordatorios.index')->only('index');
        $this->middleware('can:recordatorios.create')->only('create', 'store');
        $this->middleware('can:recordatorios.edit')->only('edit', 'update');
        $this->middleware('can:recordatorios.destroy')->only('destroy');
    }
    public function index(Request $request): View
    {

        $recordatorios = Recordatorio::where('user_id', Auth::user()->id)->get();

        return view('recordatorio.index', compact('recordatorios'))
            ->with('i', 0);
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


        $deuda = $recordatorio->modelo->deuda;

        return view('recordatorio.edit', compact('recordatorio', 'deuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $recordatorio = Recordatorio::find($id);
        $recordatorio->atendido = true;
        $recordatorio->fechahoraatencion = date('Y-m-d H:i:s');
        $recordatorio->save();
        // return Redirect::route('procesodeuda', $recordatorio->modelo->id);
        return redirect()->route('recordatorios.edit', $recordatorio->id)->with('success', 'Revisión realizada correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Recordatorio::find($id)->delete();

        return Redirect::route('recordatorios.index')
            ->with('success', 'Recordatorio deleted successfully');
    }
}
