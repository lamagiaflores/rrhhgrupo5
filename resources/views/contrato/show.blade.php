@extends('layouts.app')

@section('template_title')
    {{ $contrato->name ?? __('Show') . " " . __('Contrato') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Contrato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('contratos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Empleado:</strong>
                                    {{ $contrato->id_empleado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Contrato:</strong>
                                    {{ $contrato->tipo_contrato }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Inicio:</strong>
                                    {{ $contrato->fecha_inicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Fin:</strong>
                                    {{ $contrato->fecha_fin }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sueldo:</strong>
                                    {{ $contrato->sueldo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $contrato->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
