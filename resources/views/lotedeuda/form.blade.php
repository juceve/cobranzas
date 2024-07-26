<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="lote_id" class="form-label">{{ __('Lote Id') }}</label>
            <input type="text" name="lote_id" class="form-control @error('lote_id') is-invalid @enderror" value="{{ old('lote_id', $lotedeuda?->lote_id) }}" id="lote_id" placeholder="Lote Id">
            {!! $errors->first('lote_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="deuda_id" class="form-label">{{ __('Deuda Id') }}</label>
            <input type="text" name="deuda_id" class="form-control @error('deuda_id') is-invalid @enderror" value="{{ old('deuda_id', $lotedeuda?->deuda_id) }}" id="deuda_id" placeholder="Deuda Id">
            {!! $errors->first('deuda_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="contactado" class="form-label">{{ __('Contactado') }}</label>
            <input type="text" name="contactado" class="form-control @error('contactado') is-invalid @enderror" value="{{ old('contactado', $lotedeuda?->contactado) }}" id="contactado" placeholder="Contactado">
            {!! $errors->first('contactado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechacontacto" class="form-label">{{ __('Fechacontacto') }}</label>
            <input type="text" name="fechacontacto" class="form-control @error('fechacontacto') is-invalid @enderror" value="{{ old('fechacontacto', $lotedeuda?->fechacontacto) }}" id="fechacontacto" placeholder="Fechacontacto">
            {!! $errors->first('fechacontacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombrecontacto" class="form-label">{{ __('Nombrecontacto') }}</label>
            <input type="text" name="nombrecontacto" class="form-control @error('nombrecontacto') is-invalid @enderror" value="{{ old('nombrecontacto', $lotedeuda?->nombrecontacto) }}" id="nombrecontacto" placeholder="Nombrecontacto">
            {!! $errors->first('nombrecontacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="proxcontacto" class="form-label">{{ __('Proxcontacto') }}</label>
            <input type="text" name="proxcontacto" class="form-control @error('proxcontacto') is-invalid @enderror" value="{{ old('proxcontacto', $lotedeuda?->proxcontacto) }}" id="proxcontacto" placeholder="Proxcontacto">
            {!! $errors->first('proxcontacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="detalles" class="form-label">{{ __('Detalles') }}</label>
            <input type="text" name="detalles" class="form-control @error('detalles') is-invalid @enderror" value="{{ old('detalles', $lotedeuda?->detalles) }}" id="detalles" placeholder="Detalles">
            {!! $errors->first('detalles', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="finalizado" class="form-label">{{ __('Finalizado') }}</label>
            <input type="text" name="finalizado" class="form-control @error('finalizado') is-invalid @enderror" value="{{ old('finalizado', $lotedeuda?->finalizado) }}" id="finalizado" placeholder="Finalizado">
            {!! $errors->first('finalizado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>