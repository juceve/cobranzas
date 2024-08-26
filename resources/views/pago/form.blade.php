<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fechahorapago" class="form-label">{{ __('Fechahorapago') }}</label>
            <input type="text" name="fechahorapago" class="form-control @error('fechahorapago') is-invalid @enderror" value="{{ old('fechahorapago', $pago?->fechahorapago) }}" id="fechahorapago" placeholder="Fechahorapago">
            {!! $errors->first('fechahorapago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $pago?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="compromisopago_id" class="form-label">{{ __('Compromisopago Id') }}</label>
            <input type="text" name="compromisopago_id" class="form-control @error('compromisopago_id') is-invalid @enderror" value="{{ old('compromisopago_id', $pago?->compromisopago_id) }}" id="compromisopago_id" placeholder="Compromisopago Id">
            {!! $errors->first('compromisopago_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ncobrador" class="form-label">{{ __('Ncobrador') }}</label>
            <input type="text" name="ncobrador" class="form-control @error('ncobrador') is-invalid @enderror" value="{{ old('ncobrador', $pago?->ncobrador) }}" id="ncobrador" placeholder="Ncobrador">
            {!! $errors->first('ncobrador', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto" class="form-label">{{ __('Monto') }}</label>
            <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror" value="{{ old('monto', $pago?->monto) }}" id="monto" placeholder="Monto">
            {!! $errors->first('monto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="saldoantespago" class="form-label">{{ __('Saldoantespago') }}</label>
            <input type="text" name="saldoantespago" class="form-control @error('saldoantespago') is-invalid @enderror" value="{{ old('saldoantespago', $pago?->saldoantespago) }}" id="saldoantespago" placeholder="Saldoantespago">
            {!! $errors->first('saldoantespago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="saldodespuespago" class="form-label">{{ __('Saldodespuespago') }}</label>
            <input type="text" name="saldodespuespago" class="form-control @error('saldodespuespago') is-invalid @enderror" value="{{ old('saldodespuespago', $pago?->saldodespuespago) }}" id="saldodespuespago" placeholder="Saldodespuespago">
            {!! $errors->first('saldodespuespago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="metodopago_id" class="form-label">{{ __('Metodopago Id') }}</label>
            <input type="text" name="metodopago_id" class="form-control @error('metodopago_id') is-invalid @enderror" value="{{ old('metodopago_id', $pago?->metodopago_id) }}" id="metodopago_id" placeholder="Metodopago Id">
            {!! $errors->first('metodopago_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="comprobantes" class="form-label">{{ __('Comprobantes') }}</label>
            <input type="text" name="comprobantes" class="form-control @error('comprobantes') is-invalid @enderror" value="{{ old('comprobantes', $pago?->comprobantes) }}" id="comprobantes" placeholder="Comprobantes">
            {!! $errors->first('comprobantes', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>