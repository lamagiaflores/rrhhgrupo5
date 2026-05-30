<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class ContratoController extends Controller
{
    public function index(Request $request): View
    {
        $contratos = Contrato::with('empleado')->paginate(10); // <--- ESTO SOLUCIONA EL ERROR  
        return view('contrato.index', compact('contratos'))->with('i', 0);
    }

    public function create(): View
    {
        $contrato = new Contrato();
        $empleado = Empleado::pluck('nombres', 'id');
        return view('contrato.create', compact('contrato', 'empleado'));
    }

    public function store(Request $request): RedirectResponse
    {
        Contrato::create($request->all());
        return Redirect::route('contratos.index')
            ->with('success', 'Contrato creado correctamente.');
    }

    public function show($id): View
    {
        $contrato = Contrato::with('empleado')->find($id);
        return view('contrato.show', compact('contrato'));
    }

    public function edit($id): View
    {
        $contrato = Contrato::find($id);
        $empleado = Empleado::pluck('nombres', 'id');
        return view('contrato.edit', compact('contrato', 'empleado'));
    }

    public function update(Request $request, Contrato $contrato): RedirectResponse
    {
        $contrato->update($request->all());
        return Redirect::route('contratos.index')
            ->with('success', 'Contrato actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Contrato::find($id)->delete();
        return Redirect::route('contratos.index')
            ->with('success', 'Contrato eliminado correctamente.');
    }
}