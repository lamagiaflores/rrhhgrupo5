<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class EmpleadoController extends Controller
{
    public function index(Request $request): View
    {
        $empleados = Empleado::with('departamento', 'cargo')->paginate(10); // <--- ESTO SOLUCIONA EL ERROR 
        return view('empleado.index', compact('empleados'))->with('i', 0);
    }

    public function create(): View
    {
        $empleado = new Empleado();
        $departamento = Departamento::pluck('nombre', 'id');
        $cargo = Cargo::pluck('nombre', 'id');
        return view('empleado.create', compact('empleado', 'departamento', 'cargo'));
    }

    public function store(Request $request): RedirectResponse
    {
        Empleado::create($request->all());
        return Redirect::route('empleados.index')
            ->with('success', 'Empleado creado correctamente.');
    }

    public function show($id): View
    {
        $empleado = Empleado::with('departamento', 'cargo')->find($id);
        return view('empleado.show', compact('empleado'));
    }

    public function edit($id): View
    {
        $empleado = Empleado::find($id);
        $departamento = Departamento::pluck('nombre', 'id');
        $cargo = Cargo::pluck('nombre', 'id');
        return view('empleado.edit', compact('empleado', 'departamento', 'cargo'));
    }

    public function update(Request $request, Empleado $empleado): RedirectResponse
    {
        $empleado->update($request->all());
        return Redirect::route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Empleado::find($id)->delete();
        return Redirect::route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}