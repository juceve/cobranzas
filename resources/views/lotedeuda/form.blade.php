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
            <label for="fechahoracobro" class="form-label">{{ __('Fechahoracobro') }}</label>
            <input type="text" name="fechahoracobro" class="form-control @error('fechahoracobro') is-invalid @enderror" value="{{ old('fechahoracobro', $lotedeuda?->fechahoracobro) }}" id="fechahoracobro" placeholder="Fechahoracobro">
            {!! $errors->first('fechahoracobro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
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