@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? __('Show') . " " . __('Empleado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('empleados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Dni:</strong>
                                    {{ $empleado->dni }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombres:</strong>
                                    {{ $empleado->nombres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $empleado->apellidos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $empleado->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $empleado->correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $empleado->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Departamento:</strong>
                                    {{ $empleado->id_departamento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Cargo:</strong>
                                    {{ $empleado->id_cargo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Ingreso:</strong>
                                    {{ $empleado->fecha_ingreso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $empleado->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
