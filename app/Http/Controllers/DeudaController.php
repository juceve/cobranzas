<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DeudaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DeudaController extends Controller
{
    public function show($id): View
    {
        $deuda = Deuda::find($id);

        return view('deuda.show', compact('deuda'));
    }
}
