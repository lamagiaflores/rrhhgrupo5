@extends('layouts.app')
@section('template_title')
    Planillas
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Planillas') }}</span>
                            <div class="float-right">
                                <a href="{{ route('planillas.create') }}" class="btn btn-primary btn-sm">{{ __('+ Nueva Planilla') }}</a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4"><p>{{ $message }}</p></div>
                    @endif
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Empleado</th>
                                        <th>Mes</th>
                                        <th>Año</th>
                                        <th>Sueldo Base</th>
                                        <th>Descuentos</th>
                                        <th>Bonificaciones</th>
                                        <th>Total a Pagar</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($planillas as $planilla)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $planilla->empleado->nombres ?? '-' }} {{ $planilla->empleado->apellidos ?? '' }}</td>
                                            <td>{{ $planilla->mes }}</td>
                                            <td>{{ $planilla->anio }}</td>
                                            <td>S/. {{ number_format($planilla->sueldo_base, 2) }}</td>
                                            <td>S/. {{ number_format($planilla->descuentos, 2) }}</td>
                                            <td>S/. {{ number_format($planilla->bonificaciones, 2) }}</td>
                                            <td>S/. {{ number_format($planilla->total_pagar, 2) }}</td>
                                            <td>
                                                <div style="display:flex; gap:6px; flex-wrap:nowrap;">
                                                    <a href="{{ route('planillas.show', $planilla->id) }}" style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; border:1.5px solid #6366f1; color:#6366f1; background:#fff; text-decoration:none;" title="Ver"><i class="fas fa-eye" style="font-size:13px;"></i></a>
                                                    <a href="{{ route('planillas.edit', $planilla->id) }}" style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; border:1.5px solid #10b981; color:#10b981; background:#fff; text-decoration:none;" title="Editar"><i class="fas fa-edit" style="font-size:13px;"></i></a>
                                                    <form action="{{ route('planillas.destroy', $planilla->id) }}" method="POST" style="margin:0; padding:0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; border:1.5px solid #ef4444; color:#ef4444; background:#fff; cursor:pointer; padding:0;" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminar?')"><i class="fas fa-trash" style="font-size:13px;"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection