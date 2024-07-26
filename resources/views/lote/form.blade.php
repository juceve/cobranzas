<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="text" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $lote?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="asignado" class="form-label">{{ __('Asignado') }}</label>
            <input type="text" name="asignado" class="form-control @error('asignado') is-invalid @enderror" value="{{ old('asignado', $lote?->asignado) }}" id="asignado" placeholder="Asignado">
            {!! $errors->first('asignado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="avance" class="form-label">{{ __('Avance') }}</label>
            <input type="text" name="avance" class="form-control @error('avance') is-invalid @enderror" value="{{ old('avance', $lote?->avance) }}" id="avance" placeholder="Avance">
            {!! $errors->first('avance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="empresa_id" class="form-label">{{ __('Empresa Id') }}</label>
            <input type="text" name="empresa_id" class="form-control @error('empresa_id') is-invalid @enderror" value="{{ old('empresa_id', $lote?->empresa_id) }}" id="empresa_id" placeholder="Empresa Id">
            {!! $errors->first('empresa_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $lote?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('Status') }}</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $lote?->status) }}" id="status" placeholder="Status">
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>