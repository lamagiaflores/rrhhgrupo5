<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class AsistenciaController extends Controller
{
    public function index(Request $request): View
    {
        $asistencias = Asistencia::with('empleado')->paginate(10); // <--- ESTO SOLUCIONA EL ERROR
        return view('asistencia.index', compact('asistencias'))->with('i', 0);
    }

    public function create(): View
    {
        $asistencia = new Asistencia();
        $empleado = Empleado::pluck('nombres', 'id');
        return view('asistencia.create', compact('asistencia', 'empleado'));
    }

    public function store(Request $request): RedirectResponse
    {
        Asistencia::create($request->all());
        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia creada correctamente.');
    }

    public function show($id): View
    {
        $asistencia = Asistencia::with('empleado')->find($id);
        return view('asistencia.show', compact('asistencia'));
    }

    public function edit($id): View
    {
        $asistencia = Asistencia::find($id);
        $empleado = Empleado::pluck('nombres', 'id');
        return view('asistencia.edit', compact('asistencia', 'empleado'));
    }

    public function update(Request $request, Asistencia $asistencia): RedirectResponse
    {
        $asistencia->update($request->all());
        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia actualizada correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Asistencia::find($id)->delete();
        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia eliminada correctamente.');
    }
}