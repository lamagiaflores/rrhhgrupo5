<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="id_empleado" class="form-label">{{ __('Empleado') }}</label>
            <select name="id_empleado" class="form-select @error('id_empleado') is-invalid @enderror" id="id_empleado">
                <option value="">Seleccione un empleado</option>
                @foreach($empleado as $id => $nombre)
                    <option value="{{ $id }}" {{ old('id_empleado', $asistencia?->id_empleado) == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_empleado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $asistencia?->fecha) }}" id="fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="hora_entrada" class="form-label">{{ __('Hora Entrada') }}</label>
            <input type="time" name="hora_entrada" class="form-control @error('hora_entrada') is-invalid @enderror" value="{{ old('hora_entrada', $asistencia?->hora_entrada) }}" id="hora_entrada">
            {!! $errors->first('hora_entrada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="hora_salida" class="form-label">{{ __('Hora Salida') }}</label>
            <input type="time" name="hora_salida" class="form-control @error('hora_salida') is-invalid @enderror" value="{{ old('hora_salida', $asistencia?->hora_salida) }}" id="hora_salida">
            {!! $errors->first('hora_salida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="observacion" class="form-label">{{ __('Observación') }}</label>
            <input type="text" name="observacion" class="form-control @error('observacion') is-invalid @enderror" value="{{ old('observacion', $asistencia?->observacion) }}" id="observacion" placeholder="Observación">
            {!! $errors->first('observacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>