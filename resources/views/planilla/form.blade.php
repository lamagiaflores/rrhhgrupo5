<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="id_empleado" class="form-label">{{ __('Empleado') }}</label>
            <select name="id_empleado" class="form-select @error('id_empleado') is-invalid @enderror" id="id_empleado">
                <option value="">Seleccione un empleado</option>
                @foreach($empleado as $id => $nombre)
                    <option value="{{ $id }}" {{ old('id_empleado', $planilla?->id_empleado) == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_empleado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="mes" class="form-label">{{ __('Mes') }}</label>
            <select name="mes" class="form-select @error('mes') is-invalid @enderror" id="mes">
                <option value="">Seleccione un mes</option>
                @foreach(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'] as $mes)
                    <option value="{{ $mes }}" {{ old('mes', $planilla?->mes) == $mes ? 'selected' : '' }}>{{ $mes }}</option>
                @endforeach
            </select>
            {!! $errors->first('mes', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="anio" class="form-label">{{ __('Año') }}</label>
            <select name="anio" class="form-select @error('anio') is-invalid @enderror" id="anio">
                <option value="">Seleccione un año</option>
                @foreach(range(2020, 2030) as $anio)
                    <option value="{{ $anio }}" {{ old('anio', $planilla?->anio) == $anio ? 'selected' : '' }}>{{ $anio }}</option>
                @endforeach
            </select>
            {!! $errors->first('anio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="sueldo_base" class="form-label">{{ __('Sueldo Base') }}</label>
            <input type="number" step="0.01" name="sueldo_base" class="form-control @error('sueldo_base') is-invalid @enderror" value="{{ old('sueldo_base', $planilla?->sueldo_base) }}" id="sueldo_base" placeholder="0.00">
            {!! $errors->first('sueldo_base', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="descuentos" class="form-label">{{ __('Descuentos') }}</label>
            <input type="number" step="0.01" name="descuentos" class="form-control @error('descuentos') is-invalid @enderror" value="{{ old('descuentos', $planilla?->descuentos) }}" id="descuentos" placeholder="0.00">
            {!! $errors->first('descuentos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="bonificaciones" class="form-label">{{ __('Bonificaciones') }}</label>
            <input type="number" step="0.01" name="bonificaciones" class="form-control @error('bonificaciones') is-invalid @enderror" value="{{ old('bonificaciones', $planilla?->bonificaciones) }}" id="bonificaciones" placeholder="0.00">
            {!! $errors->first('bonificaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="total_pagar" class="form-label">{{ __('Total a Pagar') }}</label>
            <input type="number" step="0.01" name="total_pagar" class="form-control @error('total_pagar') is-invalid @enderror" value="{{ old('total_pagar', $planilla?->total_pagar) }}" id="total_pagar" placeholder="0.00">
            {!! $errors->first('total_pagar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>