<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="dni" class="form-label">{{ __('DNI') }}</label>
            <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" value="{{ old('dni', $empleado?->dni) }}" id="dni" placeholder="DNI">
            {!! $errors->first('dni', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nombres" class="form-label">{{ __('Nombres') }}</label>
            <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres', $empleado?->nombres) }}" id="nombres" placeholder="Nombres">
            {!! $errors->first('nombres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="apellidos" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos', $empleado?->apellidos) }}" id="apellidos" placeholder="Apellidos">
            {!! $errors->first('apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $empleado?->telefono) }}" id="telefono" placeholder="Teléfono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="correo" class="form-label">{{ __('Correo') }}</label>
            <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $empleado?->correo) }}" id="correo" placeholder="Correo">
            {!! $errors->first('correo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Dirección') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $empleado?->direccion) }}" id="direccion" placeholder="Dirección">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_departamento" class="form-label">{{ __('Departamento') }}</label>
            <select name="id_departamento" class="form-select @error('id_departamento') is-invalid @enderror" id="id_departamento">
                <option value="">Seleccione un departamento</option>
                @foreach($departamento as $id => $nombre)
                    <option value="{{ $id }}" {{ old('id_departamento', $empleado?->id_departamento) == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_departamento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_cargo" class="form-label">{{ __('Cargo') }}</label>
            <select name="id_cargo" class="form-select @error('id_cargo') is-invalid @enderror" id="id_cargo">
                <option value="">Seleccione un cargo</option>
                @foreach($cargo as $id => $nombre)
                    <option value="{{ $id }}" {{ old('id_cargo', $empleado?->id_cargo) == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_cargo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha_ingreso" class="form-label">{{ __('Fecha de Ingreso') }}</label>
            <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $empleado?->fecha_ingreso) }}" id="fecha_ingreso">
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" class="form-select @error('estado') is-invalid @enderror" id="estado">
                <option value="1" {{ old('estado', $empleado?->estado) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado', $empleado?->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>