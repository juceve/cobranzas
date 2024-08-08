<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="fechahoracompromiso" class="form-label">{{ __('Fechahoracompromiso') }}</label>
            <input type="text" name="fechahoracompromiso"
                class="form-control @error('fechahoracompromiso') is-invalid @enderror"
                value="{{ old('fechahoracompromiso', $compromisopago?->fechahoracompromiso) }}" id="fechahoracompromiso"
                placeholder="Fechahoracompromiso">
            {!! $errors->first('fechahoracompromiso', '<div class="invalid-feedback" role="alert">
                <strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="montocomprometido" class="form-label">{{ __('Montocomprometido') }}</label>
            <input type="text" name="montocomprometido"
                class="form-control @error('montocomprometido') is-invalid @enderror"
                value="{{ old('montocomprometido', $compromisopago?->montocomprometido) }}" id="montocomprometido"
                placeholder="Montocomprometido">
            {!! $errors->first('montocomprometido', '<div class="invalid-feedback" role="alert">
                <strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lotedeuda_id" class="form-label">{{ __('Lotedeuda Id') }}</label>
            <input type="text" name="lotedeuda_id" class="form-control @error('lotedeuda_id') is-invalid @enderror"
                value="{{ old('lotedeuda_id', $compromisopago?->lotedeuda_id) }}" id="lotedeuda_id"
                placeholder="Lotedeuda Id">
            {!! $errors->first('lotedeuda_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
            </div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="anotaciones" class="form-label">{{ __('Anotaciones') }}</label>
            <input type="text" name="anotaciones" class="form-control @error('anotaciones') is-invalid @enderror"
                value="{{ old('anotaciones', $compromisopago?->anotaciones) }}" id="anotaciones"
                placeholder="Anotaciones">
            {!! $errors->first('anotaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
            </div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechahoracontacto" class="form-label">{{ __('Fechahoracontacto') }}</label>
            <input type="text" name="fechahoracontacto"
                class="form-control @error('fechahoracontacto') is-invalid @enderror"
                value="{{ old('fechahoracontacto', $compromisopago?->fechahoracontacto) }}" id="fechahoracontacto"
                placeholder="Fechahoracontacto">
            {!! $errors->first('fechahoracontacto', '<div class="invalid-feedback" role="alert">
                <strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                value="{{ old('user_id', $compromisopago?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>')
            !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>