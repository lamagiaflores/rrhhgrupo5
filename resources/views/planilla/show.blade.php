@extends('layouts.app')

@section('template_title')
    {{ $planilla->name ?? __('Show') . " " . __('Planilla') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Planilla</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('planillas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Empleado:</strong>
                                    {{ $planilla->id_empleado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mes:</strong>
                                    {{ $planilla->mes }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Anio:</strong>
                                    {{ $planilla->anio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sueldo Base:</strong>
                                    {{ $planilla->sueldo_base }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descuentos:</strong>
                                    {{ $planilla->descuentos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Bonificaciones:</strong>
                                    {{ $planilla->bonificaciones }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total Pagar:</strong>
                                    {{ $planilla->total_pagar }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
