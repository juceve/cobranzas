<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="codigocliente" class="form-label">{{ __('Codigo Cliente') }}</label>
                    <input type="text" name="codigo" class="form-control @error('codigocliente') is-invalid @enderror"
                        value="{{ old('codigocliente', $deudore?->codigocliente) }}" id="codigocliente"
                        placeholder="Codigo Cliente" readonly>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="cliente" class="form-label">{{ __('Nombre Cliente') }}</label>
                    <input type="text" name="nombrecliente" class="form-control @error('cliente') is-invalid @enderror"
                        value="{{ old('cliente', $deudore?->cliente) }}" id="cliente" placeholder="Nombre Cliente"
                        readonly>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="docid" class="form-label">{{ __('Doc. ID') }}</label>
                    <input type="text" name="docid" class="form-control @error('docid') is-invalid @enderror"
                        value="{{ old('docid', $deudore?->docid) }}" id="docid" placeholder="Doc. ID">
                    {!! $errors->first('docid', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group{{ $errors->has('tipodoc_id') ? ' has-error' : '' }}">
                    {!! Form::label('tipodoc_id', 'Tipo Doc.') !!}
                    {!! Form::select('tipodoc_id',$tipodocs,$deudore->tipodoc_id?$deudore->tipodoc_id:1, ['id' =>
                    'tipodoc_id', 'class'
                    => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('tipodoc_id') }}</small>
                </div>

            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="fechanacimiento" class="form-label">{{ __('Fecha Nacimiento') }}</label>
                    <input type="date" name="fechanacimiento"
                        class="form-control @error('fechanacimiento') is-invalid @enderror"
                        value="{{ old('fechanacimiento', $deudore?->fechanacimiento) }}" id="fechanacimiento"
                        placeholder="Fecha Nacimiento">
                    {!! $errors->first('fechanacimiento', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="telffijo" class="form-label">{{ __('Telf. Fijo') }}</label>
                    <input type="text" name="telffijo" class="form-control @error('telffijo') is-invalid @enderror"
                        value="{{ old('telffijo', $deudore?->telffijo) }}" id="telffijo" placeholder="Telf. Fijo">
                    {!! $errors->first('telffijo', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="telfcelular" class="form-label">{{ __('Telf. Celular') }}</label>
                    <input type="text" name="celular" class="form-control @error('telfcelular') is-invalid @enderror"
                        value="{{ old('telfcelular', $deudore?->telfcelular) }}" id="telfcelular"
                        placeholder="Telf. Celular" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="telfref1" class="form-label">{{ __('Telf. Ref. 1') }}</label>
                    <input type="text" name="telfref1" class="form-control @error('telfref1') is-invalid @enderror"
                        value="{{ old('telfref1', $deudore?->telfref1) }}" id="telfref1" placeholder="Telf. Ref. 1">
                    {!! $errors->first('telfref1', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="telfref2" class="form-label">{{ __('Telf. Ref. 2') }}</label>
                    <input type="text" name="telfref2" class="form-control @error('telfref2') is-invalid @enderror"
                        value="{{ old('telfref2', $deudore?->telfref2) }}" id="telfref2" placeholder="Telf. Ref. 2">
                    {!! $errors->first('telfref2', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="telfref3" class="form-label">{{ __('Telf. Ref. 3') }}</label>
                    <input type="text" name="telfref3" class="form-control @error('telfref3') is-invalid @enderror"
                        value="{{ old('telfref3', $deudore?->telfref3) }}" id="telfref3" placeholder="Telf. Ref. 3">
                    {!! $errors->first('telfref3', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="nacionalidad" class="form-label">{{ __('Nacionalidad') }}</label>
                    <input type="text" name="nacionalidad"
                        class="form-control @error('nacionalidad') is-invalid @enderror"
                        value="{{ old('nacionalidad', $deudore?->nacionalidad) }}" id="nacionalidad"
                        placeholder="Nacionalidad">
                    {!! $errors->first('nacionalidad', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="pais" class="form-label">{{ __('Pais') }}</label>
                    <input type="text" name="pais" class="form-control @error('pais') is-invalid @enderror"
                        value="{{ old('pais', $deudore?->pais) }}" id="pais" placeholder="Pais">
                    {!! $errors->first('pais', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="ciudad" class="form-label">{{ __('Ciudad') }}</label>
                    <input type="text" name="nomciudad" class="form-control @error('ciudad') is-invalid @enderror"
                        value="{{ old('ciudad', $deudore?->ciudad) }}" id="ciudad" placeholder="Ciudad" readonly>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="domcoorx" class="form-label">{{ __('Coord. X Domicilio') }}</label>
                    <input type="text" name="domcoorx" class="form-control @error('domcoorx') is-invalid @enderror"
                        value="{{ old('domcoorx', $deudore?->domcoorx) }}" id="domcoorx"
                        placeholder="Coord. X Domicilio'">
                    {!! $errors->first('domcoorx', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="domcoory" class="form-label">{{ __('Coord. Y Domicilio') }}</label>
                    <input type="text" name="domcoory" class="form-control @error('domcoory') is-invalid @enderror"
                        value="{{ old('domcoory', $deudore?->domcoory) }}" id="domcoory"
                        placeholder="Coord. Y Domicilio">
                    {!! $errors->first('domcoory', '<div class="invalid-feedback" role="alert"><strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="domdireccion" class="form-label">{{ __('Domicilio') }}</label>
                    <input type="text" name="domdireccion"
                        class="form-control @error('domdireccion') is-invalid @enderror"
                        value="{{ old('domdireccion', $deudore?->domdireccion) }}" id="domdireccion"
                        placeholder="Domicilio">
                    {!! $errors->first('domdireccion', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="trabcoorx" class="form-label">{{ __('Coord. X Trab.') }}</label>
                    <input type="text" name="trabcoorx" class="form-control @error('trabcoorx') is-invalid @enderror"
                        value="{{ old('trabcoorx', $deudore?->trabcoorx) }}" id="trabcoorx"
                        placeholder="Coord. X Trab.">
                    {!! $errors->first('trabcoorx', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="trabcoory" class="form-label">{{ __('Coord. Y Trab.') }}</label>
                    <input type="text" name="trabcoory"
                        class="form-control @error('Coord. Y Trab.') is-invalid @enderror"
                        value="{{ old('trabcoory', $deudore?->trabcoory) }}" id="trabcoory"
                        placeholder="Coord. Y Trab.">
                    {!! $errors->first('trabcoory', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="trabdireccion" class="form-label">{{ __('Direccion Trabajo') }}</label>
                    <input type="text" name="trabdireccion"
                        class="form-control @error('trabdireccion') is-invalid @enderror"
                        value="{{ old('trabdireccion', $deudore?->trabdireccion) }}" id="trabdireccion"
                        placeholder="Direccion Trabajo">
                    {!! $errors->first('trabdireccion', '<div class="invalid-feedback" role="alert">
                        <strong>:message</strong>
                    </div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="empresa_id" class="form-label">{{ __('Empresa') }}</label>
                    <input type="text" name="empresa" class="form-control @error('empresa_id') is-invalid @enderror"
                        value="{{ old('empresa_id', $deudore?->empresa->nombre) }}" id="empresa_id"
                        placeholder="Empresa Id" readonly>

                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary col-12 col-md-4">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>