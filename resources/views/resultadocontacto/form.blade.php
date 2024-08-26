<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="resultado_id" class="form-label">{{ __('Resultado Id') }}</label>
            <input type="text" name="resultado_id" class="form-control @error('resultado_id') is-invalid @enderror" value="{{ old('resultado_id', $resultadocontacto?->resultado_id) }}" id="resultado_id" placeholder="Resultado Id">
            {!! $errors->first('resultado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="contacto_id" class="form-label">{{ __('Contacto Id') }}</label>
            <input type="text" name="contacto_id" class="form-control @error('contacto_id') is-invalid @enderror" value="{{ old('contacto_id', $resultadocontacto?->contacto_id) }}" id="contacto_id" placeholder="Contacto Id">
            {!! $errors->first('contacto_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>