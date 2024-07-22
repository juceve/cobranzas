<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="codigocliente" class="form-label">{{ __('Codigocliente') }}</label>
            <input type="text" name="codigocliente" class="form-control @error('codigocliente') is-invalid @enderror" value="{{ old('codigocliente', $deudore?->codigocliente) }}" id="codigocliente" placeholder="Codigocliente">
            {!! $errors->first('codigocliente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cliente" class="form-label">{{ __('Cliente') }}</label>
            <input type="text" name="cliente" class="form-control @error('cliente') is-invalid @enderror" value="{{ old('cliente', $deudore?->cliente) }}" id="cliente" placeholder="Cliente">
            {!! $errors->first('cliente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="docid" class="form-label">{{ __('Docid') }}</label>
            <input type="text" name="docid" class="form-control @error('docid') is-invalid @enderror" value="{{ old('docid', $deudore?->docid) }}" id="docid" placeholder="Docid">
            {!! $errors->first('docid', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipodoc_id" class="form-label">{{ __('Tipodoc Id') }}</label>
            <input type="text" name="tipodoc_id" class="form-control @error('tipodoc_id') is-invalid @enderror" value="{{ old('tipodoc_id', $deudore?->tipodoc_id) }}" id="tipodoc_id" placeholder="Tipodoc Id">
            {!! $errors->first('tipodoc_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechanacimiento" class="form-label">{{ __('Fechanacimiento') }}</label>
            <input type="text" name="fechanacimiento" class="form-control @error('fechanacimiento') is-invalid @enderror" value="{{ old('fechanacimiento', $deudore?->fechanacimiento) }}" id="fechanacimiento" placeholder="Fechanacimiento">
            {!! $errors->first('fechanacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telffijo" class="form-label">{{ __('Telffijo') }}</label>
            <input type="text" name="telffijo" class="form-control @error('telffijo') is-invalid @enderror" value="{{ old('telffijo', $deudore?->telffijo) }}" id="telffijo" placeholder="Telffijo">
            {!! $errors->first('telffijo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telfcelular" class="form-label">{{ __('Telfcelular') }}</label>
            <input type="text" name="telfcelular" class="form-control @error('telfcelular') is-invalid @enderror" value="{{ old('telfcelular', $deudore?->telfcelular) }}" id="telfcelular" placeholder="Telfcelular">
            {!! $errors->first('telfcelular', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telfref1" class="form-label">{{ __('Telfref1') }}</label>
            <input type="text" name="telfref1" class="form-control @error('telfref1') is-invalid @enderror" value="{{ old('telfref1', $deudore?->telfref1) }}" id="telfref1" placeholder="Telfref1">
            {!! $errors->first('telfref1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telfref2" class="form-label">{{ __('Telfref2') }}</label>
            <input type="text" name="telfref2" class="form-control @error('telfref2') is-invalid @enderror" value="{{ old('telfref2', $deudore?->telfref2) }}" id="telfref2" placeholder="Telfref2">
            {!! $errors->first('telfref2', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telfref3" class="form-label">{{ __('Telfref3') }}</label>
            <input type="text" name="telfref3" class="form-control @error('telfref3') is-invalid @enderror" value="{{ old('telfref3', $deudore?->telfref3) }}" id="telfref3" placeholder="Telfref3">
            {!! $errors->first('telfref3', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nacionalidad" class="form-label">{{ __('Nacionalidad') }}</label>
            <input type="text" name="nacionalidad" class="form-control @error('nacionalidad') is-invalid @enderror" value="{{ old('nacionalidad', $deudore?->nacionalidad) }}" id="nacionalidad" placeholder="Nacionalidad">
            {!! $errors->first('nacionalidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pais" class="form-label">{{ __('Pais') }}</label>
            <input type="text" name="pais" class="form-control @error('pais') is-invalid @enderror" value="{{ old('pais', $deudore?->pais) }}" id="pais" placeholder="Pais">
            {!! $errors->first('pais', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ciudad" class="form-label">{{ __('Ciudad') }}</label>
            <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad', $deudore?->ciudad) }}" id="ciudad" placeholder="Ciudad">
            {!! $errors->first('ciudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="domcoorx" class="form-label">{{ __('Domcoorx') }}</label>
            <input type="text" name="domcoorx" class="form-control @error('domcoorx') is-invalid @enderror" value="{{ old('domcoorx', $deudore?->domcoorx) }}" id="domcoorx" placeholder="Domcoorx">
            {!! $errors->first('domcoorx', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="domcoory" class="form-label">{{ __('Domcoory') }}</label>
            <input type="text" name="domcoory" class="form-control @error('domcoory') is-invalid @enderror" value="{{ old('domcoory', $deudore?->domcoory) }}" id="domcoory" placeholder="Domcoory">
            {!! $errors->first('domcoory', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="domdireccion" class="form-label">{{ __('Domdireccion') }}</label>
            <input type="text" name="domdireccion" class="form-control @error('domdireccion') is-invalid @enderror" value="{{ old('domdireccion', $deudore?->domdireccion) }}" id="domdireccion" placeholder="Domdireccion">
            {!! $errors->first('domdireccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="trabcoorx" class="form-label">{{ __('Trabcoorx') }}</label>
            <input type="text" name="trabcoorx" class="form-control @error('trabcoorx') is-invalid @enderror" value="{{ old('trabcoorx', $deudore?->trabcoorx) }}" id="trabcoorx" placeholder="Trabcoorx">
            {!! $errors->first('trabcoorx', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="trabcoory" class="form-label">{{ __('Trabcoory') }}</label>
            <input type="text" name="trabcoory" class="form-control @error('trabcoory') is-invalid @enderror" value="{{ old('trabcoory', $deudore?->trabcoory) }}" id="trabcoory" placeholder="Trabcoory">
            {!! $errors->first('trabcoory', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="trabdireccion" class="form-label">{{ __('Trabdireccion') }}</label>
            <input type="text" name="trabdireccion" class="form-control @error('trabdireccion') is-invalid @enderror" value="{{ old('trabdireccion', $deudore?->trabdireccion) }}" id="trabdireccion" placeholder="Trabdireccion">
            {!! $errors->first('trabdireccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="empresa_id" class="form-label">{{ __('Empresa Id') }}</label>
            <input type="text" name="empresa_id" class="form-control @error('empresa_id') is-invalid @enderror" value="{{ old('empresa_id', $deudore?->empresa_id) }}" id="empresa_id" placeholder="Empresa Id">
            {!! $errors->first('empresa_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>