<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="lotedeuda_id" class="form-label">{{ __('Lotedeuda Id') }}</label>
            <input type="text" name="lotedeuda_id" class="form-control @error('lotedeuda_id') is-invalid @enderror" value="{{ old('lotedeuda_id', $contacto?->lotedeuda_id) }}" id="lotedeuda_id" placeholder="Lotedeuda Id">
            {!! $errors->first('lotedeuda_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estadocontacto_id" class="form-label">{{ __('Estadocontacto Id') }}</label>
            <input type="text" name="estadocontacto_id" class="form-control @error('estadocontacto_id') is-invalid @enderror" value="{{ old('estadocontacto_id', $contacto?->estadocontacto_id) }}" id="estadocontacto_id" placeholder="Estadocontacto Id">
            {!! $errors->first('estadocontacto_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="gestiontipo_id" class="form-label">{{ __('Gestiontipo Id') }}</label>
            <input type="text" name="gestiontipo_id" class="form-control @error('gestiontipo_id') is-invalid @enderror" value="{{ old('gestiontipo_id', $contacto?->gestiontipo_id) }}" id="gestiontipo_id" placeholder="Gestiontipo Id">
            {!! $errors->first('gestiontipo_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechacontacto" class="form-label">{{ __('Fechacontacto') }}</label>
            <input type="text" name="fechacontacto" class="form-control @error('fechacontacto') is-invalid @enderror" value="{{ old('fechacontacto', $contacto?->fechacontacto) }}" id="fechacontacto" placeholder="Fechacontacto">
            {!! $errors->first('fechacontacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="horacontacto" class="form-label">{{ __('Horacontacto') }}</label>
            <input type="text" name="horacontacto" class="form-control @error('horacontacto') is-invalid @enderror" value="{{ old('horacontacto', $contacto?->horacontacto) }}" id="horacontacto" placeholder="Horacontacto">
            {!! $errors->first('horacontacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombrecontacto" class="form-label">{{ __('Nombrecontacto') }}</label>
            <input type="text" name="nombrecontacto" class="form-control @error('nombrecontacto') is-invalid @enderror" value="{{ old('nombrecontacto', $contacto?->nombrecontacto) }}" id="nombrecontacto" placeholder="Nombrecontacto">
            {!! $errors->first('nombrecontacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="proxcontacto" class="form-label">{{ __('Proxcontacto') }}</label>
            <input type="text" name="proxcontacto" class="form-control @error('proxcontacto') is-invalid @enderror" value="{{ old('proxcontacto', $contacto?->proxcontacto) }}" id="proxcontacto" placeholder="Proxcontacto">
            {!! $errors->first('proxcontacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="detalles" class="form-label">{{ __('Detalles') }}</label>
            <input type="text" name="detalles" class="form-control @error('detalles') is-invalid @enderror" value="{{ old('detalles', $contacto?->detalles) }}" id="detalles" placeholder="Detalles">
            {!! $errors->first('detalles', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="resultado" class="form-label">{{ __('Resultado') }}</label>
            <input type="text" name="resultado" class="form-control @error('resultado') is-invalid @enderror" value="{{ old('resultado', $contacto?->resultado) }}" id="resultado" placeholder="Resultado">
            {!! $errors->first('resultado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="solicitudempresa" class="form-label">{{ __('Solicitudempresa') }}</label>
            <input type="text" name="solicitudempresa" class="form-control @error('solicitudempresa') is-invalid @enderror" value="{{ old('solicitudempresa', $contacto?->solicitudempresa) }}" id="solicitudempresa" placeholder="Solicitudempresa">
            {!! $errors->first('solicitudempresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="accionpropia" class="form-label">{{ __('Accionpropia') }}</label>
            <input type="text" name="accionpropia" class="form-control @error('accionpropia') is-invalid @enderror" value="{{ old('accionpropia', $contacto?->accionpropia) }}" id="accionpropia" placeholder="Accionpropia">
            {!! $errors->first('accionpropia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="urlfoto" class="form-label">{{ __('Urlfoto') }}</label>
            <input type="text" name="urlfoto" class="form-control @error('urlfoto') is-invalid @enderror" value="{{ old('urlfoto', $contacto?->urlfoto) }}" id="urlfoto" placeholder="Urlfoto">
            {!! $errors->first('urlfoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('Status') }}</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $contacto?->status) }}" id="status" placeholder="Status">
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>