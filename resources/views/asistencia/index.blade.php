@extends('layouts.app')
@section('template_title')
    Asistencias
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Asistencias') }}</span>
                            <div class="float-right">
                                <a href="{{ route('asistencias.create') }}" class="btn btn-primary btn-sm">{{ __('+ Nueva Asistencia') }}</a>
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
                                        <th>Fecha</th>
                                        <th>Hora Entrada</th>
                                        <th>Hora Salida</th>
                                        <th>Observación</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencias as $asistencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $asistencia->empleado->nombres ?? '-' }} {{ $asistencia->empleado->apellidos ?? '' }}</td>
                                            <td>{{ $asistencia->fecha }}</td>
                                            <td>{{ $asistencia->hora_entrada }}</td>
                                            <td>{{ $asistencia->hora_salida }}</td>
                                            <td>{{ $asistencia->observacion }}</td>
                                            <td>
                                                <div style="display:flex; gap:6px; flex-wrap:nowrap;">
                                                    <a href="{{ route('asistencias.show', $asistencia->id) }}" style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; border:1.5px solid #6366f1; color:#6366f1; background:#fff; text-decoration:none;" title="Ver"><i class="fas fa-eye" style="font-size:13px;"></i></a>
                                                    <a href="{{ route('asistencias.edit', $asistencia->id) }}" style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; border:1.5px solid #10b981; color:#10b981; background:#fff; text-decoration:none;" title="Editar"><i class="fas fa-edit" style="font-size:13px;"></i></a>
                                                    <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="margin:0; padding:0;">
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