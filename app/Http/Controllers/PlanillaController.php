<?php

namespace App\Http\Controllers;

use App\Models\Planilla;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class PlanillaController extends Controller
{
    public function index(Request $request): View
    {
        $planillas = Planilla::with('empleado')->paginate(10); // <--- ESTO SOLUCIONA EL ERROR
        return view('planilla.index', compact('planillas'))->with('i', 0);
    }

    public function create(): View
    {
        $planilla = new Planilla();
        $empleado = Empleado::pluck('nombres', 'id');
        return view('planilla.create', compact('planilla', 'empleado'));
    }

    public function store(Request $request): RedirectResponse
    {
        Planilla::create($request->all());
        return Redirect::route('planillas.index')
            ->with('success', 'Planilla creada correctamente.');
    }

    public function show($id): View
    {
        $planilla = Planilla::with('empleado')->find($id);
        return view('planilla.show', compact('planilla'));
    }

    public function edit($id): View
    {
        $planilla = Planilla::find($id);
        $empleado = Empleado::pluck('nombres', 'id');
        return view('planilla.edit', compact('planilla', 'empleado'));
    }

    public function update(Request $request, Planilla $planilla): RedirectResponse
    {
        $planilla->update($request->all());
        return Redirect::route('planillas.index')
            ->with('success', 'Planilla actualizada correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Planilla::find($id)->delete();
        return Redirect::route('planillas.index')
            ->with('success', 'Planilla eliminada correctamente.');
    }
}