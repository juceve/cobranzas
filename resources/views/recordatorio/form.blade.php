<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="titulo" class="form-label">{{ __('Titulo') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $recordatorio?->titulo) }}" id="titulo" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cuerpo" class="form-label">{{ __('Cuerpo') }}</label>
            <input type="text" name="cuerpo" class="form-control @error('cuerpo') is-invalid @enderror" value="{{ old('cuerpo', $recordatorio?->cuerpo) }}" id="cuerpo" placeholder="Cuerpo">
            {!! $errors->first('cuerpo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="text" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $recordatorio?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $recordatorio?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="model" class="form-label">{{ __('Model') }}</label>
            <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model', $recordatorio?->model) }}" id="model" placeholder="Model">
            {!! $errors->first('model', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="modelid" class="form-label">{{ __('Modelid') }}</label>
            <input type="text" name="modelid" class="form-control @error('modelid') is-invalid @enderror" value="{{ old('modelid', $recordatorio?->modelid) }}" id="modelid" placeholder="Modelid">
            {!! $errors->first('modelid', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="atendido" class="form-label">{{ __('Atendido') }}</label>
            <input type="text" name="atendido" class="form-control @error('atendido') is-invalid @enderror" value="{{ old('atendido', $recordatorio?->atendido) }}" id="atendido" placeholder="Atendido">
            {!! $errors->first('atendido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechahoraatencion" class="form-label">{{ __('Fechahoraatencion') }}</label>
            <input type="text" name="fechahoraatencion" class="form-control @error('fechahoraatencion') is-invalid @enderror" value="{{ old('fechahoraatencion', $recordatorio?->fechahoraatencion) }}" id="fechahoraatencion" placeholder="Fechahoraatencion">
            {!! $errors->first('fechahoraatencion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>