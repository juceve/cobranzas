<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $metodopago?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>')
            !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombrecorto" class="form-label">{{ __('Nombre corto') }}</label>
            <input type="text" name="nombrecorto" class="form-control @error('nombrecorto') is-invalid @enderror"
                value="{{ old('nombrecorto', $metodopago?->nombrecorto) }}" id="nombrecorto" placeholder="Nombrecorto">
            {!! $errors->first('nombrecorto', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
            </div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary col-12 col-md-6 col-xl-3">Guardar <i
                class="fas fa-save"></i></button>
    </div>
</div>