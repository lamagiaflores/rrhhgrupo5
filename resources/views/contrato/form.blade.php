<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="id_empleado" class="form-label">{{ __('Empleado') }}</label>
            <select name="id_empleado" class="form-select @error('id_empleado') is-invalid @enderror" id="id_empleado">
                <option value="">Seleccione un empleado</option>
                @foreach($empleado as $id => $nombre)
                    <option value="{{ $id }}" {{ old('id_empleado', $contrato?->id_empleado) == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_empleado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tipo_contrato" class="form-label">{{ __('Tipo de Contrato') }}</label>
            <select name="tipo_contrato" class="form-select @error('tipo_contrato') is-invalid @enderror" id="tipo_contrato">
                <option value="">Seleccione tipo de contrato</option>
                <option value="Indefinido" {{ old('tipo_contrato', $contrato?->tipo_contrato) == 'Indefinido' ? 'selected' : '' }}>Indefinido</option>
                <option value="Plazo Fijo" {{ old('tipo_contrato', $contrato?->tipo_contrato) == 'Plazo Fijo' ? 'selected' : '' }}>Plazo Fijo</option>
                <option value="Por Obra" {{ old('tipo_contrato', $contrato?->tipo_contrato) == 'Por Obra' ? 'selected' : '' }}>Por Obra</option>
            </select>
            {!! $errors->first('tipo_contrato', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio" class="form-label">{{ __('Fecha Inicio') }}</label>
            <input type="date" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', $contrato?->fecha_inicio) }}" id="fecha_inicio">
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha_fin" class="form-label">{{ __('Fecha Fin') }}</label>
            <input type="date" name="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin', $contrato?->fecha_fin) }}" id="fecha_fin">
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="sueldo" class="form-label">{{ __('Sueldo') }}</label>
            <input type="number" step="0.01" name="sueldo" class="form-control @error('sueldo') is-invalid @enderror" value="{{ old('sueldo', $contrato?->sueldo) }}" id="sueldo" placeholder="0.00">
            {!! $errors->first('sueldo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" class="form-select @error('estado') is-invalid @enderror" id="estado">
                <option value="1" {{ old('estado', $contrato?->estado) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado', $contrato?->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>